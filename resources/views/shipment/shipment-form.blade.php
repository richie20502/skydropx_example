@extends('layouts.layout')

@section('title', 'Generar Envío')

@section('content')
    <h1 class="text-center mb-5">Generar Envío</h1>
    <form action="{{ route('generate.shipment') }}" method="POST">
        @csrf

        <!-- Dirección de Origen -->
        <div class="mb-4">
            <h2 class="mb-3">Dirección de Origen</h2>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="origin_name" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" name="origin_name" id="origin_name" value="Jose Fernando" required>
                </div>
                <div class="col-md-6">
                    <label for="origin_zip" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" name="origin_zip" id="origin_zip" value="02900" required>
                </div>
                <div class="col-md-6">
                    <label for="origin_city" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="origin_city" id="origin_city" value="Azcapotzalco" required>
                </div>
                <div class="col-md-6">
                    <label for="origin_province" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="origin_province" id="origin_province" value="Ciudad de México" required>
                </div>
                <div class="col-md-6">
                    <label for="origin_address1" class="form-label">Dirección 1</label>
                    <input type="text" class="form-control" name="origin_address1" id="origin_address1" value="Av. Principal #234" required>
                </div>
                <div class="col-md-6">
                    <label for="origin_address2" class="form-label">Dirección 2</label>
                    <input type="text" class="form-control" name="origin_address2" id="origin_address2" value="Centro">
                </div>
                <div class="col-md-6">
                    <label for="origin_company" class="form-label">Compañía</label>
                    <input type="text" class="form-control" name="origin_company" id="origin_company" value="skydropx">
                </div>
                <div class="col-md-6">
                    <label for="origin_phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="origin_phone" id="origin_phone" value="5555555555" required>
                </div>
                <div class="col-md-12">
                    <label for="origin_email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="origin_email" id="origin_email" value="skydropx@email.com" required>
                </div>
            </div>
        </div>

        <!-- Dirección de Destino -->
        <div class="mb-4">
            <h2 class="mb-3">Dirección de Destino</h2>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="destination_name" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" name="destination_name" id="destination_name" value="Jorge Fernández" required>
                </div>
                <div class="col-md-6">
                    <label for="destination_zip" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" name="destination_zip" id="destination_zip" value="44100" required>
                </div>
                <div class="col-md-6">
                    <label for="destination_city" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="destination_city" id="destination_city" value="Guadalajara" required>
                </div>
                <div class="col-md-6">
                    <label for="destination_province" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="destination_province" id="destination_province" value="Jalisco" required>
                </div>
                <div class="col-md-6">
                    <label for="destination_address1" class="form-label">Dirección 1</label>
                    <input type="text" class="form-control" name="destination_address1" id="destination_address1" value="Av. Lázaro Cárdenas #234" required>
                </div>
                <div class="col-md-6">
                    <label for="destination_address2" class="form-label">Dirección 2</label>
                    <input type="text" class="form-control" name="destination_address2" id="destination_address2" value="Americana">
                </div>
                <div class="col-md-6">
                    <label for="destination_phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="destination_phone" id="destination_phone" value="5555555555" required>
                </div>
                <div class="col-md-6">
                    <label for="destination_email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="destination_email" id="destination_email" value="ejemplo@skydropx.com" required>
                </div>
                <div class="col-md-12">
                    <label for="destination_reference" class="form-label">Referencia</label>
                    <input type="text" class="form-control" name="destination_reference" id="destination_reference" value="Frente a tienda de abarro">
                </div>
            </div>
        </div>

        <!-- Datos del Paquete -->
        <div class="mb-4">
            <h2 class="mb-3">Datos del Paquete</h2>
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="weight" class="form-label">Peso (kg)</label>
                    <input type="number" class="form-control" name="weight" id="weight" value="3" required>
                </div>
                <div class="col-md-3">
                    <label for="height" class="form-label">Altura (cm)</label>
                    <input type="number" class="form-control" name="height" id="height" value="10" required>
                </div>
                <div class="col-md-3">
                    <label for="width" class="form-label">Ancho (cm)</label>
                    <input type="number" class="form-control" name="width" id="width" value="10" required>
                </div>
                <div class="col-md-3">
                    <label for="length" class="form-label">Largo (cm)</label>
                    <input type="number" class="form-control" name="length" id="length" value="10" required>
                </div>
            </div>
        </div>

        <!-- Transportista -->
        <div class="mb-4">
            <h2 class="mb-3">Transportista</h2>
            <label for="carrier" class="form-label">Selecciona un Transportista:</label>
            <select name="carrier[]" id="carrier" class="form-select" multiple required>
                <option value="DHL" selected>DHL</option>
                <option value="Fedex">Fedex</option>
            </select>
        </div>

        <!-- Botón de Envío -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Generar Envío</button>
        </div>
    </form>
@endsection
