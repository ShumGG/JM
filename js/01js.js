contenedor  = new Vue ({
    el: '#contenedor',
    data: {
        user: '',
        pass: '',
        
    },
    methods: {
        login: function () {
            axios.post('index.php?url=login',{'user':this.user,'pass':this.pass}).then(function(response){
                console.log(response);
                //this.pass = response.data;
                //window.location.href = './Views/prueba.php';
                //console.log(response.data);
            },function(response) {
                console.log('error');
            }
        )},
    }
})
