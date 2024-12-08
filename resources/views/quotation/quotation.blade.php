<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h3 mb-0">Resultados de la cotización</h1>
            </div>
            <div class="card-body">
                @if(isset($quotation) && count($quotation) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Proveedor</th>
                                    <th>Nivel de servicio</th>
                                    <th>Precio (MXN)</th>
                                    <th>Días</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quotation as $quote)
                                    <tr>
                                        <td>{{ $quote['provider'] }}</td>
                                        <td>{{ $quote['service_level_name'] }}</td>
                                        <td>{{ $quote['amount_local'] }} {{ $quote['currency_local'] }}</td>
                                        <td>{{ $quote['days'] }} days</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center text-muted">No quotations found.</p>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
