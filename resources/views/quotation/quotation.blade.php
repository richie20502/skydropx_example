<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation</title>
</head>
<body>
    <h1>Quotation Results</h1>

    @if(isset($quotation) && count($quotation) > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>Provider</th>
                    <th>Service Level</th>
                    <th>Price (MXN)</th>
                    <th>Days</th>
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
    @else
        <p>No quotations found.</p>
    @endif
</body>
</html>
