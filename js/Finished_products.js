app = new Vue({
    el:'#finished_products',
    data: {
        listFinishedproducts: [],
        filterFinishedproducts:[],
        product: '',
    },
    mounted() {
        this.showFinishedproducts();
    },
    methods: {
        showFinishedproducts: function() {
            axios.get("index.php?url=get_finished_products").then((response) => {
                this.listFinishedproducts = response.data;
                this.filterFinishedproducts = response.data;
            });
        },
        findproduct: function() {
            if (this.product === "") {
                this.listFinishedproducts = this.filterFinishedproducts;
            }else {
                this.listFinishedproducts = this.filterFinishedproducts.filter(products => {
                    return products.room.match(this.product.toLowerCase()) 
                    || products.name.match(this.product.toLowerCase())
                    || products.lot.match(this.product.toLowerCase())
                    || products.quantity_packed.match(this.product.toLowerCase())
                    || products.pallet.match(this.product.toLowerCase());
                });
            }
        }
    }
})