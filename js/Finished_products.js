app = new Vue({
    el:'#finished_products',
    data: {
        productsarray:[],
        listFinishedproducts: [],
        sliceFinishedproducts:[],
        product: '',
        offset: '',
        message: "See more.",
        resultado: false,
        begin: 0,
        end: 5,
        next:5,
        arrayend: 0,
    },
    mounted() {
        this.showFinishedproducts();
    },
    methods: {
        showFinishedproducts: function() {
            axios.get("index.php?url=get_finished_products").then((response) => {
                if (response.data == 0) {
                    this.message = "No finished products yet.";
                }else {
                    this.productsarray = response.data;
                    this.listFinishedproducts = this.productsarray.slice(this.begin, this.end);
                    this.sliceFinishedproducts = this.listFinishedproducts;
                    this.begin = this.end;
                    this.end = this.end + this.next;
                    this.arrayend = this.listFinishedproducts.length;
                    this.message = (this.arrayend < 5 ) ? "No more results." : "See more";
                }
            });
        },
        findproduct: function() {
            if (this.product === "") {
                this.listFinishedproducts = this.sliceFinishedproducts;
                this.message = (this.arrayend < 5 ) ? "No more results." : "See more";
            }else {
                this.listFinishedproducts = this.productsarray.filter(products => {
                    return products.room.match(this.product.toLowerCase()) 
                    || products.name.match(this.product.toLowerCase())
                    || products.lot.match(this.product.toLowerCase())
                    || products.quantity_packed.match(this.product.toLowerCase())
                    || products.pallets.match(this.product.toLowerCase())
                    || products.start_date.match(this.product.toLowerCase())
                    || products.finish_date.match(this.product.toLowerCase());
                });
                this.message = (this.listFinishedproducts.length == 0) ? "No match." : "";
            }
        },
        seemore: function() {
            let nextproducts = this.productsarray.slice(this.begin, this.end);
            this.arrayend = nextproducts.length;
            if (this.arrayend < 5 ) {
                alert("No more results.")}
            else{
                this.message="See more";
            };
            for (i = 0 ; i < nextproducts.length ; i++) {
                this.sliceFinishedproducts.push(nextproducts[i]);
            }
            this.begin = this.end;
            this.end = this.end + this.next;
        }
    }
})