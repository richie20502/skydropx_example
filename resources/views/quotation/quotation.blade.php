@extends('layouts/layout')

@section('title', 'Resultados de la Cotización')

@section('content')
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
            <p class="text-center text-muted">No se encontraron cotizaciones.</p>
        @endif
    </div>
</div>
@endsection
