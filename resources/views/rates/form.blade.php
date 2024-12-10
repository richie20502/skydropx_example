<!DOCTYPE html>
<html>
<head>
    <title>Formulario para Obtener Tarifas</title>
</head>
<body>
    <h1>Formulario para Obtener Tarifas</h1>
    <form action="{{ route('rates.get') }}" method="POST">
        @csrf
        <h3>Origen</h3>
        <input type="text" name="origin[postal_code]" placeholder="Código Postal" value="01234" required>
        <input type="text" name="origin[country]" placeholder="País" value="MX" required>

        <h3>Destino</h3>
        <input type="text" name="destination[postal_code]" placeholder="Código Postal" value="56789" required>
        <input type="text" name="destination[country]" placeholder="País" value="MX" required>

        <h3>Paquete</h3>
        <input type="number" name="packages[0][weight]" placeholder="Peso (kg)" value="1.5" required>
        <input type="number" name="packages[0][length]" placeholder="Longitud (cm)" value="20" required>
        <input type="number" name="packages[0][width]" placeholder="Ancho (cm)" value="15" required>
        <input type="number" name="packages[0][height]" placeholder="Altura (cm)" value="10" required>

        <button type="submit">Obtener Tarifas</button>
    </form>
</body>
</html>
