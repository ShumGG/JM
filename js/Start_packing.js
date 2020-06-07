packing_section = new Vue({
    el: '#packing_section',
    data: {
        hide: true,
        showpreviousProduct: true,
        packagenewProduct: false,
        showcurrentProduct : false,
        type: '',
        room: '',
        products: [],
        show: false,
        new_name: '',
        list: [],
        actuallist: [],
        new_name: '',
        new_lot: '',
        new_quantity: '',
    },
    methods:{
        selectRoom: function() {
            axios.post("index.php?url=get_busyroom", {'room':this.room}).then((response)=>{ //GOES TO GET_BUSYROOM LINE 32 IN WEB.PHP
                if (response.data.length > 0) {
                    this.message = "Room busy! Finish it first"
                    this.actuallist = response.data;
                    this.showcurrentProduct = true;
                    this.showpreviousProduct = true;
                    this.packagenewProduct = false;
                }else {
                    this.showcurrentProduct = false;
                    this.showlastProduct(this.room);
                }
            }
        )},
        showlastProduct: function(room) {
            axios.post("index.php?url=get_previous_products", {'room':room}).then((response)=>{ //GOES TO GET_FINISHED_PRODUCTS LINE 37 IN WEB.PHP
                if (response.data.length > 0) {
                    this.list = response.data;
                    this.hide = true;
                    this.showpreviousProduct = false;
                    this.packagenewProduct = true;
                }else {
                    this.hide = false;
                    this.showpreviousProduct = true;
                    this.packagenewProduct = true;    
                }
            }
        )},
        searchProduct: function() {
            axios.post("index.php?url=get_products", {'type':this.type})
            .then(response => {
                this.products = response.data;
            });
        },
        findProduct: function() {
            this.show = true;
            if (this.new_name == "") {
                this.filteredProducts = "";
            }else {
                this.filteredProducts = this.products.filter((products) => {
                    return products.match(this.new_name.toLowerCase());
                });
            }
        },
        setProduct: function(i) {
            this.new_name = i;
            this.show = false;
        },
        startPacking: function() {                                                  //GOES TO START_PACKING LINE 42 IN WEB.PHP
            axios.post("index.php?url=start_packing", {'room':this.room, 'new_name':this.new_name, 'new_lot':this.new_lot, 'new_quantity_to_package':this.new_quantity})
            .then(response => {
                console.log(response.data);
            });
        }
    }
})