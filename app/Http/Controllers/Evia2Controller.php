<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Evia2Controller extends Controller
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('ENVIA_API_URL', 'https://api-test.envia.com');
        $this->apiKey = env('ENVIA_API_KEY');
    }

    public function index()
    {
        return view('shipments.create');
    }

    public function createShipment(Request $request)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json'
            ])->post($this->apiUrl . '/ship/generate/', [
                        'origin' => [
                            'name' => $request->input('origin_name'),
                            'company' => $request->input('origin_company'),
                            'email' => $request->input('origin_email'),
                            'phone' => $request->input('origin_phone'),
                            'street' => $request->input('origin_street'),
                            'number' => $request->input('origin_number'),
                            'district' => $request->input('origin_district'),
                            'city' => $request->input('origin_city'),
                            'state' => substr($request->input('origin_state'), 0, 2),
                            'country' => $request->input('origin_country'),
                            'postalCode' => $request->input('origin_postal_code'),
                        ],
                        'destination' => [
                            'name' => $request->input('destination_name'),
                            'company' => $request->input('destination_company'),
                            'email' => $request->input('destination_email'),
                            'phone' => $request->input('destination_phone'),
                            'street' => $request->input('destination_street'),
                            'number' => $request->input('destination_number'),
                            'district' => $request->input('destination_district'),
                            'city' => $request->input('destination_city'),
                            'state' => substr($request->input('destination_state'), 0, 2),
                            'country' => $request->input('destination_country'),
                            'postalCode' => $request->input('destination_postal_code'),
                        ],
                        'packages' => [
                            [
                                'content' => $request->input('package_content'),
                                'amount' => (int) $request->input('package_amount'),
                                'type' => $request->input('package_type'),
                                'weight' => (float) $request->input('package_weight'),
                                'insurance' => (float) $request->input('package_insurance'),
                                'declaredValue' => (float) $request->input('package_declared_value'),
                                'dimensions' => [
                                    'length' => (float) $request->input('package_length'),
                                    'width' => (float) $request->input('package_width'),
                                    'height' => (float) $request->input('package_height')
                                ]
                            ]
                        ],
                        'shipment' => [
                            'carrier' => $request->input('carrier'),
                            'service' => $request->input('service'),
                            'type' => 1
                        ],
                        'settings' => [
                            'printFormat' => 'PDF',
                            'printSize' => 'STOCK_4X6',
                            'comments' => 'Comentarios adicionales sobre el envío'
                        ]
                    ]);

            $result = $response->json();

            if ($response->successful()) {
                return redirect()->route('shipments.create')->with('success', 'Envío creado exitosamente')->with('result', $result);
            } else {
                return redirect()->route('shipments.create')->with('error', 'Error al crear el envío: ' . ($result['error']['message'] ?? 'Error desconocido'));
            }
        } catch (\Exception $e) {
            return redirect()->route('shipments.create')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function trackShipment(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required'
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json'
            ])->get($this->apiUrl . '/ship/tracking/' . $request->tracking_number);

            $result = $response->json();

            if ($response->successful()) {
                return redirect()->route('shipments.create')->with('tracking_result', $result);
            } else {
                return redirect()->route('shipments.create')->with('error', 'Error tracking shipment: ' . ($result['message'] ?? 'Unknown error'));
            }
        } catch (\Exception $e) {
            return redirect()->route('shipments.create')->with('error', 'Error: ' . $e->getMessage());
        }
    }
}

