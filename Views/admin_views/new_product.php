<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JM</title>
    </head>
    <body>
        <div id="contenedor">
            <h1>Welcome to sub admin </h1>
            <form action="index.php?url=register_product" method="post">
                <label>Product's name:</label>
                <input type="text" name="name"></p>
                <label>Quantity per box:</label>
                <input type="text" name="quantity_box"></p>
                <label>Quantity per palet (width x height):</label>
                <input type="text" name="quantity_palet"></p>
                <label>Departure room:</label>
                <input type="text" name="departure_room"></p>
                <label>Packing room:</label>
                <input type="text" name="packing_room"></p>
                <input type="submit" value="Register product" name="start_packing">
            </form>
        </div>
    </body
</html>