<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/newproduct.css"/>
        <title>JM</title>
    </head>
    <body>
    <div id= "wrapper">
        <div id="register_new_product" v-if = "hide == true">
            <section class = "register_new_product">
                <h1> Register new product </h1>
                <div class = "blocks">   
                    <label class = "register_new_product_label">Product's type:</label>
                    <select class = "register_new_product_input" v-model="type" @change="getproducts"><option value="syrup">Syrup</option><option value="pills">Pills</option><option value="capsules">Capsules</option><option value="cream">Cream</option><option value="other">Other</option></select>
                </div>
                <div class = "blocks">
                    <label class = "register_new_product_label" >Product's name:</label>
                    <input class = "register_new_product_input" type="text" name="name" v-model="name" @blur="unfocus" @input="verifyproduct" @click="verifyproduct" @focus = "reset"/>
                    <p id="checkp" v-if="checkname == true">{{message}}</p>
                    <div id="product_ul">
                        <ul v-if ="showlist == true">
                            <p v-if ="registered == true">{{message}}</p>
                            <li v-for="i in filteredProducts">
                                {{i.name}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class = "blocks">
                    <label class = "register_new_product_label">Quantity per box:</label>
                    <input class = "register_new_product_input" type="text" name="quantity_box" v-model="quantity_box"  @focus = "reset"/>
                    <p id="checkp" v-if="checkbox == true">{{message}}</p>
                </div>
                <div class = "blocks">
                    <label class = "register_new_product_label">Boxes per pallet:</label>
                    <input class = "register_new_product_input" type="text" name="box_pallet" v-model="box_pallet"  @focus = "reset"/>
                    <p id="checkp" v-if="checkpallet == true">{{message}}</p>
                </div>
                <div class = "blocks">
                    <p id="registerloading" v-if="done == true">{{message}}</p>
                     <button @click = "registerproduct" type="button"> Register new product</button>
                </div>
                <div>
                    <a href="index.php?url=admin_panel"><button id ="back_button" type="button">Back</button></a>
                </div>
            </section>
        </div>    
        
        <div id="register_new_product_result" v-if="result == true">
            <section class="register_new_product_result">
                <h1>Product registered: </h1>
                <div class ="blocks_result">
                    <label class = "register_new_product_result_label">Type:</label>
                    <input class = "register_new_product_result_input"type = "text" v-model = "type" readonly>
                </div>
                <div class ="blocks_result">
                    <label class = "register_new_product_result_label">Name: </label>
                    <input class = "register_new_product_result_input" type = "text"  v-model = "name" readonly>
                </div>
                <div class ="blocks_result">
                    <label class = "register_new_product_result_label">Quantity per box: </label>
                    <input class = "register_new_product_result_input" type = "text" v-model = "quantity_box" readonly>
                </div>
                <div class ="blocks_result">
                    <label class = "register_new_product_result_label">Quantity per pallet: </label>
                    <input class = "register_new_product_result_input" type = "text" v-model = "box_pallet" readonly>
                </div>
                <div class ="blocks_result">
                    <button @click = "close">Done</button>
                </div>
            </section>
         </div>
        <!--<a href="index.php?url=login"><button>Back</button></a>-->
    </div>
    <script src="./vuejs/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue-router"></script>
    <script src="./js/Register_new_product.js" type="text/javascript"></script>
    </body>
</html>