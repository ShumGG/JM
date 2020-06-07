<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JM</title>
    </head>
    <body>
    <div id= "wrapper">
        <h1>Welcome admin </h1>
        <div id="register_new_product" v-if = "hide == true">
           <form ref="register_form">
                <label>Product type:</label>
                <select v-model="type"><option value="syrup">Syrup</option><option value="pills">Pills</option><option value="capsules">Capsules</option><option value="cream">Cream</option><option value="other">Other</option></select></p>
                <label>Product's name:</label>
                <input type="text" name="name" v-model="name"></p>
                <label>Quantity per box:</label>
                <input type="text" name="quantity_box" v-model="quantity_box"></p>
                <label>Boxes per pallet:</label>
                <input type="text" name="box_pallet"v-model="box_pallet"></p>
                <button @click = "registerproduct" type="button"> Register new product</button>
            </form>
        </div>    
        <div id="result" v-if="result == true">
            <p>Se ha registrado el producto: </p>
            <label>Type: </label>
            <input type = "text" v-model = "type"></p>
            <label>Name: </label>
            <input type = "text"  v-model = "name"></p>
            <label>Quantity per box: </label>
            <input type = "text" v-model = "quantity_box"></p>
            <label>Quantity per pallet: </label>
            <input type = "text" v-model = "box_pallet"></p>
            <button @click = "close">Done</button>
        </div>
        <a href="index.php?url=login"><button>Back</button></a>
    </div>
    <script src="./vuejs/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue-router"></script>
    <script src="./js/Register_new_product.js" type="text/javascript"></script>
    </body
</html>