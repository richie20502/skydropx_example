@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Envío</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('shipments.store') }}" method="POST">
        @csrf
        <!-- Campos ocultos con valores predefinidos -->
        <input type="text" name="origin_name" value="Juan Pérez">
        <input type="text" name="origin_company" value="Empresa Origen SA de CV">
        <input type="text" name="origin_email" value="juan.perez@empresa-origen.com">
        <input type="text" name="origin_phone" value="5551234567">
        <input type="text" name="origin_street" value="Av. Insurgentes Sur">
        <input type="text" name="origin_number" value="1602">
        <input type="text" name="origin_district" value="Crédito Constructor">
        <input type="text" name="origin_city" value="Ciudad de México">
        <input type="text" name="origin_state" value="CM">
        <input type="text" name="origin_country" value="MX">
        <input type="text" name="origin_postal_code" value="03940">

        <input type="text" name="destination_name" value="María Rodríguez">
        <input type="text" name="destination_company" value="Empresa Destino SA de CV">
        <input type="text" name="destination_email" value="maria.rodriguez@empresa-destino.com">
        <input type="text" name="destination_phone" value="8183456789">
        <input type="text" name="destination_street" value="Av. Lázaro Cárdenas">
        <input type="text" name="destination_number" value="2400">
        <input type="text" name="destination_district" value="Residencial San Agustín">
        <input type="text" name="destination_city" value="San Pedro Garza García">
        <input type="text" name="destination_state" value="NL">
        <input type="text" name="destination_country" value="MX">
        <input type="text" name="destination_postal_code" value="66260">

        <input type="text" name="package_content" value="Documentos">
        <input type="text" name="package_amount" value="1">
        <input type="text" name="package_type" value="envelope">
        <input type="text" name="package_weight" value="0.5">
        <input type="text" name="package_insurance" value="0">
        <input type="text" name="package_declared_value" value="100">
        <input type="text" name="package_length" value="30">
        <input type="text" name="package_width" value="20">
        <input type="text" name="package_height" value="2">

        <input type="text" name="carrier" value="fedex">
        <input type="text" name="service" value="express">

        <button type="submit" class="btn btn-primary">Crear Envío con Valores Predefinidos</button>
    </form>

    <hr>

    <h2 class="mt-4">Rastrear Envío</h2>
    <form action="{{ route('shipments.track') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tracking_number">Número de Rastreo</label>
            <input type="text" class="form-control" id="tracking_number" name="tracking_number" required>
        </div>
        <button type="submit" class="btn btn-secondary">Rastrear Envío</button>
    </form>

    @if (session('result'))
        <h3 class="mt-4">Resultado del Envío</h3>
        <pre>{{ json_encode(session('result'), JSON_PRETTY_PRINT) }}</pre>
    @endif

    @if (session('tracking_result'))
        <h3 class="mt-4">Resultado del Rastreo</h3>
        <pre>{{ json_encode(session('tracking_result'), JSON_PRETTY_PRINT) }}</pre>
    @endif
</div>
@endsection

