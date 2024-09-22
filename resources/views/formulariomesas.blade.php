<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('mesa.insertarmesa') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="imagen_mesa" id="imagen_mesas">
        <h1>forma mesas</h1>
        <input type="text" name="forma_mesas" id="forma_mesas">
        <h1>cantida de mesas</h1>
        <input type="number" name="cant_mesas" id="cant_mesas">
        <h1>audiencia dirigida de mesas</h1>
        <select name="audiencia_mesas" id="audiencia_mesas">
            <option value="Adultos">Adultos</option>
            <option value="Niños">Niños</option>
        </select>

        <input type="submit" value="agreagr sillas">
    </form>
</body>
</html>