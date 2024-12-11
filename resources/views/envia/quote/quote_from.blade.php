<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Cotización</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Generar Cotización</h1>

        <form method="POST" action="{{ url('/enviar-cotizacion') }}">
            @csrf

            <!-- Datos del origen -->
            <div class="card mb-4">
                <div class="card-header">Datos del Origen</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="originName" class="form-label">Nombre</label>
                            <input type="text" id="originName" name="origin[name]" class="form-control" value="USA" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="originCompany" class="form-label">Empresa</label>
                            <input type="text" id="originCompany" name="origin[company]" class="form-control" value="enviacommarcelo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="originEmail" class="form-label">Correo Electrónico</label>
                            <input type="email" id="originEmail" name="origin[email]" class="form-control" value="juanpedrovazez@hotmail.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="originPhone" class="form-label">Teléfono</label>
                            <input type="text" id="originPhone" name="origin[phone]" class="form-control" value="8182000536" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="originStreet" class="form-label">Calle</label>
                            <input type="text" id="originStreet" name="origin[street]" class="form-control" value="351523" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="originNumber" class="form-label">Número</label>
                            <input type="text" id="originNumber" name="origin[number]" class="form-control" value="crescent ave" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="originCity" class="form-label">Ciudad</label>
                            <input type="text" id="originCity" name="origin[city]" class="form-control" value="cuajimalpa" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="originState" class="form-label">Estado</label>
                            <input type="text" id="originState" name="origin[state]" class="form-control" value="cmx" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="originPostalCode" class="form-label">Código Postal</label>
                            <input type="text" id="originPostalCode" name="origin[postalCode]" class="form-control" value="05000" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Datos del destino -->
            <div class="card mb-4">
                <div class="card-header">Datos del Destino</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="destinationName" class="form-label">Nombre</label>
                            <input type="text" id="destinationName" name="destination[name]" class="form-control" value="francisco" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="destinationPhone" class="form-label">Teléfono</label>
                            <input type="text" id="destinationPhone" name="destination[phone]" class="form-control" value="8180180543" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="destinationStreet" class="form-label">Calle</label>
                            <input type="text" id="destinationStreet" name="destination[street]" class="form-control" value="avenida revolución" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="destinationNumber" class="form-label">Número</label>
                            <input type="text" id="destinationNumber" name="destination[number]" class="form-control" value="1500" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="destinationCity" class="form-label">Ciudad</label>
                            <input type="text" id="destinationCity" name="destination[city]" class="form-control" value="ciudad de méxico" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="destinationState" class="form-label">Estado</label>
                            <input type="text" id="destinationState" name="destination[state]" class="form-control" value="cmx" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="destinationPostalCode" class="form-label">Código Postal</label>
                            <input type="text" id="destinationPostalCode" name="destination[postalCode]" class="form-control" value="01000" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información del paquete -->
            <div class="card mb-4">
                <div class="card-header">Información del Paquete</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="packageContent" class="form-label">Contenido</label>
                            <input type="text" id="packageContent" name="packages[0][content]" class="form-control" value="zapatos" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="packageWeight" class="form-label">Peso (LB)</label>
                            <input type="number" id="packageWeight" name="packages[0][weight]" class="form-control" value="1" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="packageDimensions" class="form-label">Dimensiones (LxWxH en pulgadas)</label>
                            <input type="text" id="packageDimensions" name="packages[0][dimensions]" class="form-control" value="11x15x20" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón de envío -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Generar Cotización</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
