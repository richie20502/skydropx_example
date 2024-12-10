<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para Crear Envío</title>
</head>
<body>
    <h1>Formulario para Crear Envío</h1>
    <form action="{{ route('shipments.create') }}" method="POST">
        @csrf

        <h3>Origen</h3>
        <input type="text" name="origin[name]" placeholder="Nombre" value="Juan Perez" required>
        <input type="text" name="origin[street]" placeholder="Calle" value="Av. Insurgentes" required>
        <input type="text" name="origin[city]" placeholder="Ciudad" value="Ciudad de México" required>
        <input type="text" name="origin[state]" placeholder="Estado" value="CDMX" required>
        <input type="text" name="origin[postal_code]" placeholder="Código Postal" value="01234" required>
        <input type="text" name="origin[country]" placeholder="País" value="MX" required>

        <h3>Destino</h3>
        <input type="text" name="destination[name]" placeholder="Nombre" value="Maria Lopez" required>
        <input type="text" name="destination[street]" placeholder="Calle" value="Calle Reforma" required>
        <input type="text" name="destination[city]" placeholder="Ciudad" value="Guadalajara" required>
        <input type="text" name="destination[state]" placeholder="Estado" value="Jalisco" required>
        <input type="text" name="destination[postal_code]" placeholder="Código Postal" value="56789" required>
        <input type="text" name="destination[country]" placeholder="País" value="MX" required>

        <h3>Paquete</h3>
        <input type="number" name="packages[0][weight]" placeholder="Peso (kg)" value="1.5" required>
        <input type="number" name="packages[0][length]" placeholder="Longitud (cm)" value="20" required>
        <input type="number" name="packages[0][width]" placeholder="Ancho (cm)" value="15" required>
        <input type="number" name="packages[0][height]" placeholder="Altura (cm)" value="10" required>

        <button type="submit">Crear Envío</button>
    </form>
</body>
</html>
