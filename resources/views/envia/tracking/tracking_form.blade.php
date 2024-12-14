<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Envío - Envia.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Formulario de Creación de Envío</h1>
        <form id="shipmentForm" method="POST">
            @csrf
            <h3>Origen</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="originName" class="form-label">Nombre</label>
                    <input type="text" id="originName" name="origin[name]" class="form-control" value="John Doe" required>
                </div>
                <div class="col-md-6">
                    <label for="originPhone" class="form-label">Teléfono</label>
                    <input type="text" id="originPhone" name="origin[phone]" class="form-control" value="5551234567" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="originStreet" class="form-label">Calle</label>
                    <input type="text" id="originStreet" name="origin[street]" class="form-control" value="Main Street" required>
                </div>
                <div class="col-md-6">
                    <label for="originPostalCode" class="form-label">Código Postal</label>
                    <input type="text" id="originPostalCode" name="origin[postal_code]" class="form-control" value="01000" required>
                </div>
            </div>
            
            <h3>Destino</h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="destinationName" class="form-label">Nombre</label>
                    <input type="text" id="destinationName" name="destination[name]" class="form-control" value="Jane Doe" required>
                </div>
                <div class="col-md-6">
                    <label for="destinationPhone" class="form-label">Teléfono</label>
                    <input type="text" id="destinationPhone" name="destination[phone]" class="form-control" value="5557654321" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="destinationStreet" class="form-label">Calle</label>
                    <input type="text" id="destinationStreet" name="destination[street]" class="form-control" value="2nd Street" required>
                </div>
                <div class="col-md-6">
                    <label for="destinationPostalCode" class="form-label">Código Postal</label>
                    <input type="text" id="destinationPostalCode" name="destination[postal_code]" class="form-control" value="44100" required>
                </div>
            </div>
            
            <h3>Paquete</h3>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="packageWeight" class="form-label">Peso (kg)</label>
                    <input type="number" step="0.1" id="packageWeight" name="packages[0][weight]" class="form-control" value="2.5" required>
                </div>
                <div class="col-md-4">
                    <label for="packageLength" class="form-label">Largo (cm)</label>
                    <input type="number" id="packageLength" name="packages[0][length]" class="form-control" value="30" required>
                </div>
                <div class="col-md-4">
                    <label for="packageWidth" class="form-label">Ancho (cm)</label>
                    <input type="number" id="packageWidth" name="packages[0][width]" class="form-control" value="30" required>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="packageHeight" class="form-label">Altura (cm)</label>
                    <input type="number" id="packageHeight" name="packages[0][height]" class="form-control" value="30" required>
                </div>
                <div class="col-md-8 mt-3">
                    <label for="packageContent" class="form-label">Contenido</label>
                    <input type="text" id="packageContent" name="packages[0][content]" class="form-control" value="Clothes" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear Envío</button>
        </form>

        <!-- Resultados -->
        <div id="result" class="mt-5">
            <h3>Resultado:</h3>
            <pre id="resultContent"></pre>
        </div>
    </div>

    <script>
        document.getElementById('shipmentForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            // Leer los datos del formulario
            const formData = new FormData(e.target);

            // Convertir a JSON (incluyendo el campo _token)
            const data = Object.fromEntries(formData);
            console.log(data);
            console.log(data._token);

            try {
                const response = await fetch('/api/shipments', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        // Incluimos el token en los headers también
                        'X-CSRF-TOKEN': data._token,
                    },
                    body: JSON.stringify(data),
                });

                const result = await response.json();

                console.log(result);
                document.getElementById('resultContent').textContent = JSON.stringify(result, null, 2);
            } catch (error) {
                console.log(error);
                document.getElementById('resultContent').textContent = 'Error: ' + error.message;
            }
        });
    </script>
</body>
</html>
