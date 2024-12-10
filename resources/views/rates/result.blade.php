<!DOCTYPE html>
<html>
<head>
    <title>Resultado de Tarifas</title>
</head>
<body>
    <h1>Resultado de las Tarifas</h1>

    @if(isset($response) && !empty($response))
        <h3>Detalles de las Tarifas:</h3>
        <p><strong>Tarifa:</strong> {{ $response['rate'] ?? 'No disponible' }}</p>
    @else
        <h3>No se pudieron obtener las tarifas. Por favor, intenta de nuevo.</h3>
    @endif

    <a href="{{ route('rates.form') }}">Regresar al formulario de tarifas</a>
</body>
</html>
