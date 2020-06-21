<html>
    <head>
        <meta charset="UTF-8">
        <link rel ="stylesheet" type="text/css" href="./css/adminpanel.css"/>
        <title>JM</title>
    </head>
    <body>
    <div id="admin_panel">
        <section class = "admin_panel">
            <h1>Welcome admin: {{user}}</h1>
            <button class = "admin_button" @click = "register_new_product">Register new product</button>
            <button class = "admin_button"@click = "package_new_product">Package new product</button>
            <button class = "admin_button"@click = "see_actual_products">See actual products</button>
            <button class = "admin_button"@click = "finished_products">Finished products</button>
            <button class = "admin_button" @click = "logout" type="button">Logout</button>
        </section>
    </div>
        <script src="./vuejs/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue-router"></script>
        <script src="./js/Admin_panel.js" type="text/javascript"></script>
    </body>
</html>
