packing_section = new Vue({
    el: '#packing_section',
    data: {
        hide: false,
        showpreviousProduct: false,
        packagenewProduct: false,
        showcurrentProduct : false,
        type: '',
        room: '',
        products: [],
        filteredProducts: [],
        new_name: '',
        list: [],
        showlist: false,
        currentproduct: [],
        new_name: '',
        new_lot: '',
        new_quantity: '',
        new_quantity_send: '',
        successful: false,
        selecttype: false,
        checkname : false,
        checklot: false,
        checkquantity: false,
    },
    methods: {
        selectRoom: function() {
            axios.post("index.php?url=get_busyroom", {'room':this.room}).then((response)=>{ //GOES TO GET_BUSYROOM LINE 32 IN WEB.PHP
                if (response.data.length > 0) {
                    this.message = "Room busy! Finish it first."
                    this.hide = false;
                    this.currentproduct = response.data;
                    this.showcurrentProduct = true;
                    this.showpreviousProduct = false;
                    this.packagenewProduct = false;
                }else {
                    this.showlastProduct(this.room);
                }
            }
        )},
        showlastProduct: function(room) {
            axios.post("index.php?url=get_previous_products", {'room':room}).then((response)=>{ //GOES TO GET_FINISHED_PRODUCTS LINE 37 IN WEB.PHP
                if (response.data.length > 0) {
                    this.hide = false;
                    this.showcurrentProduct = false;
                    this.list = response.data;
                    this.showpreviousProduct = true;
                    this.packagenewProduct = true;
                }else {
                    this.hide = true;
                    this.showcurrentProduct = false;
                    this.showpreviousProduct = false;
                    this.packagenewProduct = true;
                }
            }
        )},
        searchProduct: function() {
            this.selecttype = false;
            axios.post("index.php?url=get_products", {'type':this.type})
            .then(response => {
                this.products = response.data;
            });
        },
        findProduct: function() {
            if (this.type == "") {
                this.selecttype = true;
                this.checkname = false;
                this.new_name = "";
                this.message = "Select product's type";
            }else {
                if (this.new_name == "") {
                    this.showlist = false;
                    this.filteredProducts = []; 
                }else{
                    this.filteredProducts = this.products.filter(products => {
                        return products.name.match(this.new_name.toLowerCase());
                    });
                    if (this.filteredProducts == "") {
                        this.showlist = true;
                        this.message = "No product with this name, please register it first.";
                        if (this.new_name == "") {
                            this.showlist = false;
                        }
                    }else {
                        this.showlist = true;
                        this.message = "Registered products: ";
                    }
                }
            }
        },
        focus: function() {
            if (this.showlist) {
                this.showlist = false;
            }
        },
        set: function(i) {
           this.new_name = i;
           this.showlist = false;
        },
        checkinputs: function() {
            let quantity =  /^[0-9]+$/;
            let lot = /^[0-9]{6}[A-Z]*$/;
            let verified = false;
            
            if (this.new_name == "") {
                this.checkname = true;
                this.message = "Insert a name to the product.";
            }else {
                if (this.new_lot.match(lot) == null) {
                    this.checklot = true;
                    this.message= "Insert a valid lot, 6 digits [0-9] with option of at least one or more capital letter [A-Z].";
                }else {
                    if (this.new_quantity_send.match(quantity) == null) {
                        this.checkquantity = true;
                        this.message = "Insert a valid quantity.";
                    }else{
                        verified = true;     
                    }
                }
            }
            if (verified) {return verified;}
        },
        quantityformat: function() {

            let quantity = "";

            if (this.new_quantity != "") {
                quantity = this.new_quantity.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                this.new_quantity = quantity;
                this.new_quantity_send = quantity.replace(/,/g,'');
            }
        },
        startPacking: function() {     
            console.log(this.checkinputs());
            if(this.checkinputs()) {
                axios.post("index.php?url=start_packing", {'room':this.room, 'new_name':this.new_name, 'new_lot':this.new_lot, 'new_quantity_to_package':this.new_quantity})
                .then(response => {                                                                                                 
                    if (response.data) {
                        this.successful = true;                                                                                                 //GOES TO START_PACKING LINE 62 IN WEB.PHP
                        if (response.status == 200) {
                        setTimeout(() => {
                            location.href = "index.php?url=see_actual_products";
                        }, 2000);
                        }
                    }else {
                        alert(response.data);
                    }
                });
            }
        }
    }
})
