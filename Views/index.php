<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <title>JM</title>
</head>
<body>
    <div id="index">
        <section class = "form_login">
            <h1>Welcome admin</h1>
            <form>
                <input class = "inputs" type="text" name="user" @focus="clear" v-model = "user" placeholder = "User">
                <input class = "inputs" type="password" name="pass" @focus="clear" v-model = "pass" placeholder ="Password">
                <label class = "label" v-if="result_login == false">{{message}}</label>
                <button class="login_button" type="button" @click="login">Login</button>
            </form>
        </section>
    </div>
    <script src="./vuejs/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue-router"></script>
    <script src="./js/index.js" type="text/javascript"></script>
</body>
</html>