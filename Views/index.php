<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="./css/estilos.css">
        <title>JM</title>
    </head>
    <body>
        <div id="contenedor">
            <h1>Welcome to admin</h1>
            <form action="index.php?url=login" method="post">
                <label>User:</label>
                <input type="text" name="user" v-model = "user">
                <label>Pass:</label>
                <input type="text" name="pass" v-model = "pass">
                <button>Login</button>
            </form>
            <!--<button @click="login" type="button">Login</button>-->
        </div>
        <script src="./vuejs/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue-router"></script>
        <script src="./js/01js.js" type="text/javascript"></script>
    </body>
    </html>