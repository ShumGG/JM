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
                <label>Product type:</label>
                <select name="type[]"><option value="syrup">Syrup</option><option value="pills">Pills</option><option value="capsules">Capsules</option><option value="cream">Cream</option><option value="other">Other</option></select></p>
                <label>Product's name:</label>
                <input type="text" name="p_name"></p>
                <label>Quantity per box:</label>
                <input type="text" name="q_box"></p>
                <input type="submit" value="Register product" name="register">
            </form>
        </div>
    </body
</html>