<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
            'zip_from' => '01000',
            'zip_to' => '64000',
            'parcel' => [
                'weight' => '1',
                'height' => '10',
                'width' => '10',
                'length' => '10',
            ],
            'carriers' => [
                ['name' => 'DHL'],
                ['name' => 'Fedex'],
            ],
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

            return view('quotation', ['quotation' => $responseData]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}