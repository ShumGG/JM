app = new Vue({
    el:'#actual_products',
    data: {
        listCurrentproducts: [],
        showProducts: true
    },
    mounted() {
        this.showCurrentproducts();
    },
    methods: {
        showCurrentproducts: function() {
            axios.get("index.php?url=get_current_products").then((response) => {
                if (response.data.length > 0) {
                    this.listCurrentproducts = response.data;
                    this.showProducts = false;
                }
            });
        },
        addPallet: function(room) {
            axios.post("index.php?url=add_pallet",{'room':room}).then((response)=> {
                this.showCurrentproducts();
            });
        },
        finish: function(room) {
            axios.post("index.php?url=finish_package",{'room':room}).then((response)=> {
                this.showCurrentproducts();
            });
        }
    }
})