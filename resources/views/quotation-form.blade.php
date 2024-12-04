<form action="{{ route('get.quotation') }}" method="POST">
    @csrf
    <label for="zip_from">Código Postal de Origen:</label>
    <input type="text" name="zip_from" id="zip_from" value="01000" required>

    <label for="zip_to">Código Postal de Destino:</label>
    <input type="text" name="zip_to" id="zip_to" value="64000" required>

    <label for="weight">Peso (kg):</label>
    <input type="number" name="weight" id="weight" value="1" required>

    <label for="height">Altura (cm):</label>
    <input type="number" name="height" id="height" value="10" required>

    <label for="width">Ancho (cm):</label>
    <input type="number" name="width" id="width" value="10" required>

    <label for="length">Largo (cm):</label>
    <input type="number" name="length" id="length" value="10" required>

    <label for="carriers">Transportistas:</label>
    <select name="carriers[]" id="carriers" multiple required>
        <option value="DHL" selected>DHL</option>
        <option value="Fedex" selected>Fedex</option>
    </select>

    <button type="submit">Obtener Cotización</button>
</form>
