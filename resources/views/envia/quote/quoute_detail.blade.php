@extends('layouts/layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Opciones de Envío</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Transportista</th>
                    <th>Servicio</th>
                    <th>Tiempo de Entrega</th>
                    <th>Precio Base</th>
                    <th>Precio Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shippingRates as $option)
                    <tr>
                        <td>{{ $option['carrierDescription'] }}</td>
                        <td>{{ $option['serviceDescription'] }}</td>
                        <td>{{ $option['deliveryEstimate'] }}</td>
                        <td>{{ number_format($option['basePrice'], 2) }} {{ $option['currency'] }}</td>
                        <td>{{ number_format($option['totalPrice'], 2) }} {{ $option['currency'] }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="selectShippingOption({{ json_encode($option) }})">
                                Seleccionar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
function selectShippingOption(option) {
    console.log('Opción seleccionada:', option);
    // Aquí puedes agregar la lógica para manejar la selección de la opción de envío
    // Por ejemplo, enviar los datos a otra parte de tu aplicación o al servidor
}
</script>
@endsection