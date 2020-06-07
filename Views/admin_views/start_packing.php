<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JM</title>
    </head>
    <body>
        <h1>Welcome admin </h1>
        <div id="packing_section">
            <select v-model="room" @change="selectRoom"><option value="22">22</option><option value="34">34</option><option value="139">139</option><option value="158">158</option></select>
            <a href="index.php?url=login"><button>Back</button></a>
            <div id="no_products" v-if = "hide == false">
                <p>There's no previous product made in this room </p>
            </div>
            <div v-if = "showcurrentProduct == true">
                <h3> {{message}}</h3>
                <table id="list" v-for="row in actuallist">
                    <tr>
                        <td>
                            <label>Actual product's name: {{row.name}}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Actual product's lot: {{row.lot}}</label>
                        </td>
                    </tr>    
                    <tr>    
                        <td>
                            <label>Quantity to package: {{row.quantity_to_package}}</label>
                        </td>
                    </tr>    
                    <tr>
                        <td>
                            <label>Quantity of pallets: {{row.pallets}}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Quantity of finished pallets: {{row.finished_pallets}}</label>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="products" v-if = "showpreviousProduct == false">
                <table id="list" v-for="row in list">
                    <tr>
                        <td>
                            <label>Previous product's name: {{row.name}}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Previous product's lot: {{row.lot}}</label>
                        </td>
                    </tr>    
                    <tr>    
                        <td>
                            <label>Quantity packed: {{row.quantity_packed}}</label>
                        </td>
                    </tr>    
                    <tr>
                        <td>
                            <label>Quantity of pallets: {{row.pallet}}</label>
                        </td>
                    </tr>
                </table>
            </div>
            <div v-if = "packagenewProduct == true">
                <table>
                    <form>
                        <tr>
                            <td>
                                <label>Type:</label>
                                <select v-model="type" @change ="searchProduct"><option value="syrup">Syrup</option><option value="pills">Pills</option><option value="capsules">Capsules</option><option value="cream">Cream</option><option value="other">Other</option></select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>New Product's name:</label>
                                <input type="text" v-model="new_name" @input="findProduct" @click="findProduct"></p>
                                <ul v-if = "show == true">
                                    <li v-for="i in filteredProducts" @click="setProduct(i)">
                                        {{i}}
                                    </li>
                                <ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>New Product's lot:</label>
                                <input type="text" v-model="new_lot"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Quantity to be packed:</label>
                                    <input type="text" v-model="new_quantity"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" @click="startPacking">Start packing!</button>
                                </td>
                            </tr>
                    </form>
                </table>
            </div>
        </div>
        <script src="./vuejs/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue-router"></script>
        <script src="./js/Start_packing.js" type="text/javascript"></script>
    </body
</html>