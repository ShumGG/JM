app = new Vue({
    el:'#see_actual_products',
    data: {
        listCurrentproducts: [],
        showProducts: false,
        message: "Completed."
    },
    mounted() {
        this.showCurrentproducts();
    },
    methods: {
        showCurrentproducts: function() {
            axios.get("index.php?url=get_current_products").then((response) => {
                if (response.data.length > 0) {
                    this.showProducts = false;
                    this.listCurrentproducts = response.data;
                }else {
                    this.showProducts = true;
                    this.message = "There's no current products in making.";
                }
            });
        },
        addPallet: function(room) {
            axios.post("index.php?url=add_pallet",{'room':room}).then((response)=> {
                if (response.data) {
                    this.finished = false;
                    this.finish = true;
                }
                this.showCurrentproducts();
            });
        },
        clearroom: function(room) {
            axios.post("index.php?url=finish_package",{'room':room}).then((response)=> {
                if (response.data == null) {
                    this.showCurrentproducts();
                }else {
                    alert(response.data);
                }
            });
        }
    }
})