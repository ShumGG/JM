contenedor  = new Vue ({
    el: '#index',
    data: {
        user: '',
        pass: '',
        result_login: true,
        message: '',
    },
    methods: {
        login: function () {
            axios.post('index.php?url=login',{'user':this.user,'pass':this.pass}).then(response =>{
                if (response.data == "") {
                    location.href="index.php?url=admin_panel";
                }else {
                    this.result_login = false;
                    this.message = "Incorrect user or password!.";
                }
            });
        },
        clear: function() {
            this.result_login = true;
        }
    }
})
