<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel = "stylesheet" type="text/css" href="./css/see_actual_products.css"/> 
        <title>JM</title>
    </head>
    <body>
        <div id="see_actual_products">
           <div id="see_actual_products_container">
                <div id="products" v-if="showProducts == true">
                    <h1>{{message}}</h1>
                    <a href="index.php"><button id="back_button1">Back</button></a>
                </div>
                <table id="table_container_actual_products" v-if = "showProducts == false">
                    <tr><td><a href="index.php?url=package_new_product"><button id="back_button">Back</button></a></td></tr>
                    <tr>
                        <th>Current products in production.</th>
                    </tr>
                    <tr>
                        <td>
                            <div id="table_actual_products_div">
                                <table id ="table_actual_products" v-for="i in listCurrentproducts">
                                    <tr>
                                        <th>Room: {{i.room}}</th>
                                    </tr>
                                    <tr> 
                                        <td>Name: {{i.name}}</td>
                                    </tr>
                                    <tr>    
                                        <td>LOT: {{i.lot}}</td>
                                    </tr>    
                                    <tr>    
                                        <td>Quantity to be package: {{i.quantity_to_package}}</td>
                                    </tr>
                                    <tr>    
                                        <td>Quantity of pallets: {{i.pallets}}</td>
                                    </tr>
                                    <tr> 
                                        <td>Progress: {{i.progress}}</td>
                                    </tr>
                                    <tr> 
                                        <td>Start date: {{i.start_date}}</td>
                                    </tr>
                                    <tr>
                                        <td v-if="i.finished_pallets != i.pallets">
                                            {{i.finished_pallets}} pallets of {{i.pallets}} pallets
                                            <button @click="addPallet(i.room)">Add Pallet</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td v-if="i.finished_pallets == i.pallets">
                                            <h3>{{message}}</h3>
                                            <button @click="clearroom(i.room)">Clear room.</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>    
                    </tr> 
                </table>
            </div>
        </div>
        <script src="./vuejs/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue-router"></script>
        <script src="./js/See_actual_products.js" type="text/javascript"></script>
    </body
</html>