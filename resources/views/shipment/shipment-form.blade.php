<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Envío</title>
</head>
<body>
    <h1>Generar Envío</h1>
    <form action="{{ route('generate.shipment') }}" method="POST">
        @csrf

        <!-- Dirección de Origen -->
        <h2>Dirección de Origen</h2>
        <label for="origin_name">Nombre Completo:</label>
        <input type="text" name="origin_name" id="origin_name" value="Jose Fernando" required><br>

        <label for="origin_zip">Código Postal:</label>
        <input type="text" name="origin_zip" id="origin_zip" value="02900" required><br>

        <label for="origin_city">Ciudad:</label>
        <input type="text" name="origin_city" id="origin_city" value="Azcapotzalco" required><br>

        <label for="origin_province">Estado:</label>
        <input type="text" name="origin_province" id="origin_province" value="Ciudad de México" required><br>

        <label for="origin_address1">Dirección 1:</label>
        <input type="text" name="origin_address1" id="origin_address1" value="Av. Principal #234" required><br>

        <label for="origin_address2">Dirección 2:</label>
        <input type="text" name="origin_address2" id="origin_address2" value="Centro"><br>

        <label for="origin_company">Compañía:</label>
        <input type="text" name="origin_company" id="origin_company" value="skydropx"><br>

        <label for="origin_phone">Teléfono:</label>
        <input type="text" name="origin_phone" id="origin_phone" value="5555555555" required><br>

        <label for="origin_email">Email:</label>
        <input type="email" name="origin_email" id="origin_email" value="skydropx@email.com" required><br>

        <!-- Dirección de Destino -->
        <h2>Dirección de Destino</h2>
        <label for="destination_name">Nombre Completo:</label>
        <input type="text" name="destination_name" id="destination_name" value="Jorge Fernández" required><br>

        <label for="destination_zip">Código Postal:</label>
        <input type="text" name="destination_zip" id="destination_zip" value="44100" required><br>

        <label for="destination_city">Ciudad:</label>
        <input type="text" name="destination_city" id="destination_city" value="Guadalajara" required><br>

        <label for="destination_province">Estado:</label>
        <input type="text" name="destination_province" id="destination_province" value="Jalisco" required><br>

        <label for="destination_address1">Dirección 1:</label>
        <input type="text" name="destination_address1" id="destination_address1" value="Av. Lázaro Cárdenas #234" required><br>

        <label for="destination_address2">Dirección 2:</label>
        <input type="text" name="destination_address2" id="destination_address2" value="Americana"><br>

        <label for="destination_phone">Teléfono:</label>
        <input type="text" name="destination_phone" id="destination_phone" value="5555555555" required><br>

        <label for="destination_email">Email:</label>
        <input type="email" name="destination_email" id="destination_email" value="ejemplo@skydropx.com" required><br>

        <label for="destination_reference">Referencia:</label>
        <input type="text" name="destination_reference" id="destination_reference" value="Frente a tienda de abarro"><br>

        <!-- Datos del Paquete -->
        <h2>Datos del Paquete</h2>
        <label for="weight">Peso (kg):</label>
        <input type="number" name="weight" id="weight" value="3" required><br>

        <label for="height">Altura (cm):</label>
        <input type="number" name="height" id="height" value="10" required><br>

        <label for="width">Ancho (cm):</label>
        <input type="number" name="width" id="width" value="10" required><br>

        <label for="length">Largo (cm):</label>
        <input type="number" name="length" id="length" value="10" required><br>

        <!-- Transportista -->
        <h2>Transportista</h2>
        <label for="carrier">Selecciona un Transportista:</label>
        <select name="carrier[]" id="carrier" multiple required>
            <option value="DHL" selected>DHL</option>
            <option value="Fedex">Fedex</option>
        </select><br><br>

        <button type="submit">Generar Envío</button>
    </form>
</body>
</html>
