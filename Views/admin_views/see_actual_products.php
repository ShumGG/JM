<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JM</title>
    </head>
    <body>
       <div id="actual_products">
            <div id="products">
                <h1 v-if="showProducts == true"> There's no current products in making</h1>
            </div>
            <table v-for="i in listCurrentproducts" style="float:left; border-style:solid; border-color: 2px black; margin:50px">
                <caption>Room: {{i.room}}:</caption>
                    <tr> 
                        <td>
                            Name:
                        </td>
                        <td>
                            {{i.name}}
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            LOT:
                        </td>
                        <td>
                            {{i.lot}}
                        </td>
                    </tr>    
                    <tr>    
                        <td>
                            Quantity to be package:
                        </td>
                        <td>
                            {{i.quantity_to_package}}
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            Quantity of pallets: 
                        </td>
                        <td>
                            {{i.pallets}}
                        </td>
                    </tr>
                    <tr> 
                        <td>
                            Progress:
                        </td>
                        <td>
                            {{i.progress}}%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{i.finished_pallets}} pallets of {{i.pallets}} pallets
                        </td>
                        <td>
                            <button @click="addPallet(i.room)">Add Pallet</button>
                        </td>
                    </tr>
                    <tr v-if="i.pallets == i.finished_pallets">
                        <td>
                            <h3>Completed</h3>
                            <button @click="finish(i.room)">Finish procedure</button>
                        </td>
                    </tr>
            </table>
       </div>
        <script src="./vuejs/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue-router"></script>
        <script src="./js/See_actual_products.js" type="text/javascript"></script>
    </body
</html>