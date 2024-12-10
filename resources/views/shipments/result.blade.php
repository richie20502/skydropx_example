<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Crear Envío</title>
</head>
<body>
    <h1>Resultado de la Solicitud de Envío</h1>

    @if(isset($response) && !empty($response))
        <h3>Detalles del Envío Creado:</h3>
        <p><strong>Envío ID:</strong> {{ $response['shipment_id'] ?? 'No disponible' }}</p>
        <p><strong>Estado:</strong> {{ $response['status'] ?? 'No disponible' }}</p>
        <p><strong>Enlace para rastreo:</strong> <a href="{{ $response['tracking_url'] ?? '#' }}" target="_blank">Rastrear Envío</a></p>
    @elseif(isset($error))
        <h3>Error: {{ $error }}</h3>
    @else
        <h3>No se pudo crear el envío. Por favor, intenta de nuevo.</h3>
    @endif

    <a href="{{ route('shipments.form') }}">Regresar al formulario de creación de envío</a>
</body>
</html>
