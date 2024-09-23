<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('brincolin.insertarbrincolin') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="imagen_brincolines" id="imagen_mesas">
        <h1>nombre brincolin</h1>
        <input type="text" name="nombre_brincolines" id="nombre_brincolines">
        <h1>cantida de brincolines</h1>
        <input type="number" name="cant_brincolines" id="cant_brincolines">
        <h1>categoria del brincolin</h1>
        <select name="cat_brincolines" id="cat_brincolines">
            <option value="acuatico">acuatico</option>
            <option value="seco">seco</option>
        </select>
        <h1>categoria del brincolin</h1>
        <select name="tam_brincolines" id="tam_brincolines">
            <option value="grande">grande</option>
            <option value="mediano">mediano</option>
            <option value="chico">chico</option>
        </select>
        <input type="submit" value="agreagr brincolin">
    </form>
</body>
</html>