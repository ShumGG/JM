app = new Vue({
    el:'#app',
    data: {
        list: [],
        resultado: '',
        showProducts:true,
    },
    mounted() {
        this.hola();
    },
    methods: {
        hola: function() {
            axios.get("index.php?url=get_current_products").then((response) => {
                this.list = response.data;
            });
        },
        addPallet: function(room) {
            axios.post("index.php?url=add_pallet",{'room':room}).then((response)=> {
                this.hola();
            });
        },
        finish: function(room) {
            axios.post("index.php?url=finish_package",{'room':room}).then((response)=> {
                this.hola();
            });
        }
    }
})