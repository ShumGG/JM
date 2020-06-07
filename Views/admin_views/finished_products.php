<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JM</title>
    </head>
    <body>
       <div id="finished_products">
            <div id = "finished_products_table">
                <input v-model="product" @input="findproduct" placeholder="Search by name"></input>
                <a href="index.php?url=login"><button>Back</button></a>
                <table v-for="i in listFinishedproducts">
                        <tr> 
                            <td>
                                Name:
                            </td>
                            <td>
                                Lot:
                            </td>
                            <td>
                                Quantity packed:
                            </td>
                            <td>
                                Quantity of pallets:
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                {{i.name}}
                            </td>
                            <td>
                                {{i.lot}}
                            </td>
                            <td>
                                {{i.quantity_packed}}
                            </td>
                            <td>
                                {{i.pallet}}
                            </td>
                        </tr>
                </table>
            </div>
        </div>
        <script src="./vuejs/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue-router"></script>
        <script src="./js/Finished_products.js" type="text/javascript"></script>
    </body
</html>