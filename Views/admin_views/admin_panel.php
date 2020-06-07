<html>
    <head>
        <meta charset="UTF-8">
        <title>JM</title>
    </head>
    <body>
        <h1>Welcome admin: {admin} </h1>
    <div id="admin_panel">
        <table>
            <tr>
                <td>
                    <button @click="register_new_product">Register new product</button>
                </td>
            </tr>
                <td>
                    <button @click="package_new_product">Package new product</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button @click="see_actual_products">See actual products</button>
                </td>
            </tr>
            <tr>
                 <td>
                    <button @click="finished_products">Finished Products</button>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="index.php?url=waiting_products" method="post">
                        <button>Wainting products</button>
                    </form>
                </td>    
            </tr>
            <tr>
                <td>
                    <button @click = "logout" type="button">Logout</button>
                </td>
            </tr>
        </table>
    </div>
        <script src="./vuejs/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue-router"></script>
        <script src="./js/Admin_panel.js" type="text/javascript"></script>
    </body>
</html>
