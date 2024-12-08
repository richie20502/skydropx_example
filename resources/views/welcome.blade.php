@extends('layouts.layout')

@section('title', 'Inicio - Skydropx')

@section('content')
<div class="text-center">
    <h1>Bienvenido a Skydropx</h1>
    <p class="lead">Selecciona una opción para comenzar:</p>
    <div class="d-flex justify-content-center gap-3 mt-4">
        <a href="{{ route('shipment-form') }}" class="btn btn-primary btn-lg">Ir al Formulario de Envío</a>
        <a href="{{ route('quotation-form') }}" class="btn btn-secondary btn-lg">Ir al Formulario de Cotización</a>
    </div>
</div>
@endsection
