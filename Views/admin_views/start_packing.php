<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/startpacking.css"/>
        <title>JM</title>
    </head>
    <body>
        <div id="packing_section">
            <section id = "start_packing">
                <div class = "blocks">
                    <div id="select_room">
                        <label>Select room:</label>
                        <select v-model="room" @change="selectRoom"><option value="22">22</option><option value="34">34</option><option value="139">139</option><option value="158">158</option></select>
                        <a href="index.php"><button>Back</button></a>
                    </div>
                    <div id="no_products" v-if = "hide == true">
                        <p>There's no previous product made in this room.</p>
                    </div>
                </div>

                <div class= "blocks">
                    <div id="show_current_products" v-if = "showcurrentProduct == true">
                        <h1>{{message}}</h1>
                        <label v-for="row in currentproduct">Actual product's name: {{row.name}}</label>
                        <label v-for="row in currentproduct">Actual product's lot: {{row.lot}}</label>
                        <label v-for="row in currentproduct">Quantity to package:  {{row.quantity_to_package}}</label>
                        <label v-for="row in currentproduct">Quantity of pallets:  {{row.pallets}}</label>
                        <label v-for="row in currentproduct">Quantity of finished pallets: {{row.finished_pallets}}</label>
                    </div>
                </div>
                
                <div class = "blocks">
                    <div id="show_previous_products" v-if = "showpreviousProduct == true">
                        <h1>Previous product:</h1>
                        <label v-for="row in list" >Previous product's name: {{row.name}}</label>
                        <label v-for="row in list" >Previous product's lot: {{row.lot}}</label>
                        <label v-for="row in list" >Previous product's quantity packed: {{row.quantity_packed}}</label>
                        <label v-for="row in list" >Previous product's quantity of pallets: {{row.pallet}}</label>
                    </div>
                </div>

                <div class ="blocks">
                    <div id ="package_new_product" v-if = "packagenewProduct == true">
                        <h1> New Product:</h1>
                        <label class ="package_new_product_label">Type:</label>
                        <select class ="package_new_product_input" v-model="type" @change ="searchProduct" @click = "searchProduct"><option value="syrup">Syrup</option><option value="pills">Pills</option><option value="capsules">Capsules</option><option value="cream">Cream</option><option value="other">Other</option></select>
                        <label class ="package_new_product_label" >New Product's name:</label>
                        <input class ="package_new_product_input" type="text" v-model="new_name" @input="findProduct" @click="findProduct">
                        <p id="product_type" v-if="checkname == true">{{message}}</p>
                        <p id="product_type" v-if="selecttype == true">Select product's type.</p>
                        <div id="product_ul" v-if ="showlist == true">
                            <ul v-if ="showlist == true">
                                <p>{{message}}</p>
                                <li v-for="i in filteredProducts" @click="set(i.name)">
                                    {{i.name}}
                                </li>
                            </ul>
                        </div>
                        <label class ="package_new_product_label">New Product's lot:</label>
                        <input class ="package_new_product_input" type="text" v-model="new_lot" @focus="focus">
                        <p id="product_type" v-if="checklot == true">{{message}}</p>
                        <label class ="package_new_product_label">Quantity to package:</label>
                        <input class ="package_new_product_input" type="text" v-model="new_quantity" @focus="focus" @input="quantityformat">
                        <p id="product_type" v-if="checkquantity == true">{{message}}</p>
                        <button id = "packing_button" type="button" @click="startPacking">Start packing!</button>
                        <h3 v-if="successful == true">Loading...</h3>
                    </div>
                </div>
            </section>
        </div>



        <script src="./vuejs/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue-router"></script>
        <script src="./js/Start_packing.js" type="text/javascript"></script>
    </body
</html>