<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Shipment Details</h1>

        <!-- Shipment General Info -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>General Information</h3>
            </div>
            <div class="card-body">
                <p><strong>Status:</strong> {{ $shipment['data']['attributes']['status'] }}</p>
                <p><strong>Created At:</strong> {{ $shipment['data']['attributes']['created_at'] }}</p>
                <p><strong>Updated At:</strong> {{ $shipment['data']['attributes']['updated_at'] }}</p>
            </div>
        </div>

        <!-- Address From -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Address From</h3>
            </div>
            <div class="card-body">
                @php
                    $addressFrom = collect($shipment['included'])->firstWhere('id', $shipment['data']['relationships']['address_from']['data']['id']);
                @endphp
                <p><strong>Name:</strong> {{ $addressFrom['attributes']['name'] }}</p>
                <p><strong>Company:</strong> {{ $addressFrom['attributes']['company'] }}</p>
                <p><strong>Address:</strong> {{ $addressFrom['attributes']['address1'] }} {{ $addressFrom['attributes']['address2'] }}</p>
                <p><strong>City:</strong> {{ $addressFrom['attributes']['city'] }}</p>
                <p><strong>Province:</strong> {{ $addressFrom['attributes']['province'] }}</p>
                <p><strong>ZIP:</strong> {{ $addressFrom['attributes']['zip'] }}</p>
                <p><strong>Phone:</strong> {{ $addressFrom['attributes']['phone'] }}</p>
                <p><strong>Email:</strong> {{ $addressFrom['attributes']['email'] }}</p>
            </div>
        </div>

        <!-- Address To -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Address To</h3>
            </div>
            <div class="card-body">
                @php
                    $addressTo = collect($shipment['included'])->firstWhere('id', $shipment['data']['relationships']['address_to']['data']['id']);
                @endphp
                <p><strong>Name:</strong> {{ $addressTo['attributes']['name'] }}</p>
                <p><strong>Company:</strong> {{ $addressTo['attributes']['company'] }}</p>
                <p><strong>Address:</strong> {{ $addressTo['attributes']['address1'] }} {{ $addressTo['attributes']['address2'] }}</p>
                <p><strong>City:</strong> {{ $addressTo['attributes']['city'] }}</p>
                <p><strong>Province:</strong> {{ $addressTo['attributes']['province'] }}</p>
                <p><strong>ZIP:</strong> {{ $addressTo['attributes']['zip'] }}</p>
                <p><strong>Phone:</strong> {{ $addressTo['attributes']['phone'] }}</p>
                <p><strong>Email:</strong> {{ $addressTo['attributes']['email'] }}</p>
            </div>
        </div>

        <!-- Parcel Info -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Parcel Details</h3>
            </div>
            <div class="card-body">
                @php
                    $parcel = collect($shipment['included'])->firstWhere('id', $shipment['data']['relationships']['parcels']['data'][0]['id']);
                @endphp
                <p><strong>Weight:</strong> {{ $parcel['attributes']['weight'] }} {{ $parcel['attributes']['mass_unit'] }}</p>
                <p><strong>Dimensions:</strong> {{ $parcel['attributes']['length'] }}x{{ $parcel['attributes']['width'] }}x{{ $parcel['attributes']['height'] }} {{ $parcel['attributes']['distance_unit'] }}</p>
            </div>
        </div>

        <!-- Rates -->
        <div class="card">
            <div class="card-header">
                <h3>Shipping Rates</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Provider</th>
                            <th>Service Level</th>
                            <th>Price</th>
                            <th>Currency</th>
                            <th>Estimated Days</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (collect($shipment['included'])->where('type', 'rates') as $rate)
                            <tr>
                                <td>{{ $rate['attributes']['provider'] }}</td>
                                <td>{{ $rate['attributes']['service_level_name'] }}</td>
                                <td>{{ $rate['attributes']['total_pricing'] }}</td>
                                <td>{{ $rate['attributes']['currency_local'] }}</td>
                                <td>{{ $rate['attributes']['days'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
