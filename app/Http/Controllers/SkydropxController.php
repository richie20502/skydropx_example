<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;        

class SkydropxController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getQuotation(Request $request)
    {
        $data = [
            'zip_from' => $request->input('zip_from'),  // Código postal de origen
            'zip_to' => $request->input('zip_to'),      // Código postal de destino
            'parcel' => [
                'weight' => $request->input('weight'),    // Peso
                'height' => $request->input('height'),    // Altura
                'width' => $request->input('width'),      // Ancho
                'length' => $request->input('length'),    // Largo
            ],
            'carriers' => array_map(function ($carrier) {
                return ['name' => $carrier];
            }, $request->input('carriers', [])), // Obtener los transportistas seleccionados
        ];
    
        try {
            $response = $this->client->post(env('SKYDROPX_BASE_URL')."quotations", [
                'headers' => [
                    'Authorization' => 'Token token=' . env('SKYDROPX_API_KEY'),
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);
    
            $responseData = json_decode($response->getBody()->getContents(), true);
    
            return view('quotation/quotation', ['quotation' => $responseData]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function generateShipment(Request $request)
    {
        $data = [
            'address_from' => [
                'province' => $request->origin_province,
                'city' => $request->origin_city,
                'name' => $request->origin_name,
                'zip' => $request->origin_zip,
                'country' => 'MX',
                'address1' => $request->origin_address1,
                'address2' => $request->origin_address2,
                'company' => $request->origin_company,
                'phone' => $request->origin_phone,
                'email' => $request->origin_email,
            ],
            'parcels' => [
                [
                    'weight' => (int) $request->weight,
                    'distance_unit' => 'CM',
                    'mass_unit' => 'KG',
                    'height' => (int) $request->height,
                    'width' => (int) $request->width,
                    'length' => (int) $request->length,
                ]
            ],
            'address_to' => [
                'province' => $request->destination_province,
                'city' => $request->destination_city,
                'name' => $request->destination_name,
                'zip' => $request->destination_zip,
                'country' => 'MX',
                'address1' => $request->destination_address1,
                'address2' => $request->destination_address2,
                'phone' => $request->destination_phone,
                'email' => $request->destination_email,
                'reference' => $request->destination_reference,
            ],
            'consignment_note_class_code' => '53131600',
            'consignment_note_packaging_code' => '1H1',
            'carriers' => collect($request->carrier)->map(fn($carrier) => ['name' => $carrier])->toArray(),
        ];

        try {
            $client = new Client();
            $response = $client->post(env('SKYDROPX_BASE_URL') . 'shipments', [
                'headers' => [
                    'Authorization' => 'Token token=' . env('SKYDROPX_API_KEY'),
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            $shipment = json_decode($response->getBody(), true);
            Log::info($shipment);

            return view('shipment/shipment', ['shipment' => $shipment]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }



}