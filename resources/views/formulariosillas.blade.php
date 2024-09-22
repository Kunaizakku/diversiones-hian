<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('silla.insertarsilla') }}" method="post" enctype="multipart/form-data">
        @csrf


        <input type="file" name="imagen_silla" id="imagen_silla">
        <h1>forma silla</h1>
        <input type="text" name="forma_sillas" id="forma_sillas">
        <h1>cantida de sillas</h1>
        <input type="number" name="cant_sillas" id="cant_sillas">
        <h1>audiencia dirigida de sillas</h1>
        <select name="audiencia_sillas" id="audiencia_sillas">
            <option value="Adultos">Adultos</option>
            <option value="Niños">Niños</option>
        </select>

        <input type="submit" value="agreagr sillas">
    </form>
</body>
</html>