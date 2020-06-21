<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/finished_products.css"/>
        <title>JM</title>
    </head>
    <body>
        <div id="finished_products">
            <div id="finished_products_table">
                <div id="table_container">
                    <table id="tittle_table">
                        <colgroup>
                           <col width="10%"/>
                            <col width="10%" />
                            <col width="10%" />
                            <col width="10%" />
                            <col width="10%" />
                            <col width="10%" />
                            <col width="10%" />
                        </colgroup>
                        <tr>
                            <td colspan="7">
                                <input v-model="product" @input="findproduct" placeholder="Search..." />
                                <a href="index.php"><button>Back</button></a>
                            </td>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Lot</th>
                            <th>Quantity packed</th>
                            <th>Quantity of pallets</th>
                            <th>Start date</th>
                            <th>Finish date</th>
                        </tr>
                    </table>
                    <table id="products_table">
                        <colgroup>
                            <col width="10%"/>
                            <col width="10%"/>
                            <col width="10%"/>
                            <col width="10%"/>
                            <col width="10%" />
                            <col width="10%" />
                            <col width="10%" />
                        </colgroup>
                        <tr v-for="i in listFinishedproducts">
                            <td>{{i.id}}</td>
                            <td>{{i.name}}</td>
                            <td>{{i.lot}}</td>
                            <td>{{i.quantity_packed}}</td>
                            <td>{{i.pallets}}</td>
                            <td>{{i.start_date}}</td>
                            <td>{{i.finish_date}}</td>
                        </tr>
                        <tr>
                            <td colspan="7"><a href="#" @click = "hola">{{message}}</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <script src="./vuejs/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue-router"></script>
        <script src="./js/Finished_products.js" type="text/javascript"></script>
    </body
</html>