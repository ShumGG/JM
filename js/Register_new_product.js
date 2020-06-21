wrapper = new Vue({
    el: '#wrapper',
    data: {
        hide: true,
        result: false,
        type: '',
        name: '',
        quantity_box: '',
        box_pallet: '',
        products: [],
        filteredProducts: [],
        showlist: false,
        registered: false,
        message: '',
        checkname: false,
        checkbox: false,
        checkpallet: false,
        done: false,
    },
    methods: {
        getproducts: function() {
            this.checkname = false;
            axios.post("index.php?url=get_products",{'type':this.type}).then(response => {
                this.products = response.data;
            });
        },
        verifyproduct: function() {
            this.done = false;
            this.showlist = true;
            if (this.type == "") {
                this.checkname = true;
                this.message = "Select the type of the product";
            }else {
                if (this.name == "") {
                    this.filteredProducts = ""; 
                }else{
                    this.filteredProducts = this.products.filter(products => { return products.name.match(this.name.toLowerCase())});
                    this.registered = true;
                    this.message = "Products registered:";
                    this.showlist = true;
                }
                if (this.filteredProducts == "") {
                    this.registered = false;
                }
            }
        },
        reset: function() {
            this.checkname = false;
            this.checkbox = false;
            this.checkpallet = false;
        },
        unfocus: function() {
            this.showlist = false;
        },
        checkinputs: function() {
            let whitespace = /^ *$/;
            let specialcharacter = /^(?![\s\S]*[^\w -]+)[\s\S]+?$/;
            let quantity =  /^[0-9]{1,}$/;
            let verified = false;
            if (this.name === "" || this.name.match(whitespace)) {
                this.checkname = true;
                this.message = "Insert a name to the product.";
            }else if (this.name.match(specialcharacter) == null) {
                this.checkname = true;
                this.message = "Insert a name to the product without special characters";
            }else {
                if (this.quantity_box.match(quantity) == null) {
                    this.checkbox = true;
                    this.message= "Insert a valid quantity to box.";
                }else {
                    if (this.box_pallet.match(quantity) == null) {
                        this.checkpallet = true;
                        this.message = "Insert a valid quantity to pallet.";
                    }else{
                        verified = true;     
                    }
                }
            }
            if (verified) {return true;}
        },
        registerproduct: function() {
            if(this.checkinputs()) {
                /*axios.post("index.php?url=register_product", {'type':this.type,'name':this.name,'quantity_box':this.quantity_box,'box_pallet':this.box_pallet}
                ).then((response)=>{
                    if (response.data) {
                        this.done = true;
                        this.message = "Registering, please wait...";
                        setTimeout(() => {
                            this.hide = false;
                            this.result = true;
                        },1000);
                    }else {
                        this.done = true;
                        this.message = "This products is already registered!.";
                    }
                })*/
                console.log("perfecto");
            }
        },
        close:function() {
            this.message = "";
            this.hide = true,
            this.type = '',
            this.name = '',
            this.quantity_box = '',
            this.box_pallet = '',
            this.result = false;
        }
    }
})
