<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JM</title>
    </head>
    <body>
        <div id="contenedor">
            <h1>Welcome to sub admin </h1>
            <form action="index.php?url=login" method="post">
                <label>Room:</label>
                <input type="text" name="pp_room" value="{room}" readonly></p>
                <label>Name of the previous product:</label>
                <input type="text" name="n_pp" value="{n_pp}"readonly></p>
                <label>LOT number of the previous product:</label>
                <input type="text" name="lot_pp" value="{lot_pp}" readonly></p>
                <label>Quantity of previous product produced:</label>
                <input type="text" name="q_pp" value="{q_pp}" readonly></p>
                <label>New Product's name:</label>
                <input type="text" name="np_name"></p>
                <label>New product's LOT Number:</label>
                <input type="text" name="np_lot"></p>
                <label>Quantity produced:</label>
                <input type="text" name="quantity_p"></p>
                <label>Quantity per box:</label>
                <input type="text" name="quantity_box"></p>
                <label>Quantity of boxes per pallet:</label>
                <input type="text" name="quantity_box_pallet"></p>
                <input type="submit" value="Start Packing!" name="start_packing">
            </form>
        </div>
    </body
</html>