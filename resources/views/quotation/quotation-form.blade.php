<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obtener Cotización</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Obtener Cotización</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('get.quotation') }}" method="POST">
                    @csrf

                    <!-- Código Postal de Origen -->
                    <div class="mb-3">
                        <label for="zip_from" class="form-label">Código Postal de Origen:</label>
                        <input type="text" class="form-control" name="zip_from" id="zip_from" value="01000" required>
                    </div>

                    <!-- Código Postal de Destino -->
                    <div class="mb-3">
                        <label for="zip_to" class="form-label">Código Postal de Destino:</label>
                        <input type="text" class="form-control" name="zip_to" id="zip_to" value="64000" required>
                    </div>

                    <!-- Peso -->
                    <div class="mb-3">
                        <label for="weight" class="form-label">Peso (kg):</label>
                        <input type="number" class="form-control" name="weight" id="weight" value="1" required>
                    </div>

                    <!-- Altura -->
                    <div class="mb-3">
                        <label for="height" class="form-label">Altura (cm):</label>
                        <input type="number" class="form-control" name="height" id="height" value="10" required>
                    </div>

                    <!-- Ancho -->
                    <div class="mb-3">
                        <label for="width" class="form-label">Ancho (cm):</label>
                        <input type="number" class="form-control" name="width" id="width" value="10" required>
                    </div>

                    <!-- Largo -->
                    <div class="mb-3">
                        <label for="length" class="form-label">Largo (cm):</label>
                        <input type="number" class="form-control" name="length" id="length" value="10" required>
                    </div>

                    <!-- Transportistas -->
                    <div class="mb-3">
                        <label for="carriers" class="form-label">Transportistas:</label>
                        <select class="form-select" name="carriers[]" id="carriers" multiple required>
                            <option value="DHL" selected>DHL</option>
                            <option value="Fedex" selected>Fedex</option>
                        </select>
                        
                    </div>

                    <!-- Botón de envío -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Obtener Cotización</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
