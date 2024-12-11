<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class EnviaController extends Controller
{
    // Definir la URL base y la API Key desde el archivo .env
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('ENVIA_API_URL'); // URL de la API
        $this->apiKey = env('ENVIA_API_KEY'); // API Key desde el .env
    }

    // Mostrar el formulario
    public function showForm()
    {
        return view('shipments.form');
    }

    // Crear el envío a través de la API
    public function createShipment(Request $request)
    {
        try {
            // Validar los datos recibidos del formulario
            $data = $request->validate([
                'origin.name' => 'required|string',
                'origin.street' => 'required|string',
                'origin.city' => 'required|string',
                'origin.state' => 'required|string',
                'origin.postal_code' => 'required|string',
                'origin.country' => 'required|string',
                'destination.name' => 'required|string',
                'destination.street' => 'required|string',
                'destination.city' => 'required|string',
                'destination.state' => 'required|string',
                'destination.postal_code' => 'required|string',
                'destination.country' => 'required|string',
                'packages' => 'required|array',
                'packages.*.weight' => 'required|numeric',
                'packages.*.length' => 'required|numeric',
                'packages.*.width' => 'required|numeric',
                'packages.*.height' => 'required|numeric',
            ]);

            // Crear una instancia de Guzzle HTTP Client
            $client = new Client();

            // Realizar la solicitud POST a la API
            $response = $client->post($this->apiUrl . '/shipments', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            // Obtener la respuesta en formato JSON
            $responseData = json_decode($response->getBody()->getContents(), true);

            // Verificar si la respuesta fue exitosa
            if ($response->getStatusCode() == 200) {
                return view('shipments.result', ['response' => $responseData]);
            } else {
                // Si la respuesta no es exitosa, manejar el error
                $errorMessage = $responseData['message'] ?? 'Hubo un error desconocido al crear el envío.';
                return view('shipments.result', ['error' => $errorMessage]);
            }

        } catch (ValidationException $e) {
            // Si ocurre un error de validación, capturamos la excepción
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (RequestException $e) {
            // Capturamos cualquier error relacionado con la solicitud HTTP
            return view('shipments.result', ['error' => 'Error al realizar la solicitud: ' . $e->getMessage()]);
        } catch (Exception $e) {
            // Capturamos cualquier otra excepción general
            return view('shipments.result', ['error' => $e->getMessage()]);
        }
    }


    public function showRequestForm()
    {
        return view('envia.quote.quote_from');
    }


    public function sendRequest()
    {
        $payload = [
            "origin" => [
                "name" => "USA",
                "company" => "enviacommarcelo",
                "email" => "juanpedrovazez@hotmail.com",
                "phone" => "8182000536",
                "street" => "351523",
                "number" => "crescent ave",
                "district" => "other",
                "city" => "cuajimalpa",
                "state" => "cmx",
                "country" => "MX",
                "postalCode" => "05000",
                "reference" => "",
                "coordinates" => [
                    "latitude" => "19.357850",
                    "longitude" => "-99.290440",
                ],
            ],
            "destination" => [
                "name" => "francisco",
                "company" => "",
                "email" => "",
                "phone" => "8180180543",
                "street" => "avenida revolución",
                "number" => "1500",
                "district" => "san angel",
                "city" => "ciudad de méxico",
                "state" => "cmx",
                "country" => "MX",
                "postalCode" => "01000",
                "reference" => "",
                "coordinates" => [
                    "latitude" => "19.348778",
                    "longitude" => "-99.189602",
                ],
            ],
            "packages" => [
                [
                    "content" => "zapatos",
                    "amount" => 1,
                    "type" => "box",
                    "weight" => 1,
                    "insurance" => 0,
                    "declaredValue" => 0,
                    "weightUnit" => "LB",
                    "lengthUnit" => "IN",
                    "dimensions" => [
                        "length" => 11,
                        "width" => 15,
                        "height" => 20,
                    ],
                ],
            ],
            "shipment" => [
                "carrier" => "DHL",
                "type" => 1,
            ],
            "settings" => [
                "currency" => "MXN",
            ],
        ];

        $client = new Client();

        try {
            $response = $client->post('https://api-test.envia.com/ship/rate/', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer 4e6ea14b99b91a9317da7d1c5227a8ff280452fe4c40b3fee25dbaa9ae7e9f2a',
                ],
                'json' => $payload,
            ]);

            $responseBody = json_decode($response->getBody(), true);

            return view('envia.quote.quoute_detail', ['shippingRates' => $responseBody['data']]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
