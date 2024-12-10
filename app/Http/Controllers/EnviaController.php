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
}
