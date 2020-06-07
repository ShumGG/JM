wrapper = new Vue({
    el: '#wrapper',
    data: {
        hide: true,
        result: false,
        type: '',
        name: '',
        quantity_box: '',
        box_pallet: '',
    },
    methods: {
        registerproduct:function() {
            axios.post("index.php?url=register_product", {'type':this.type,'name':this.name,'quantity_box':this.quantity_box,'box_pallet':this.box_pallet}
            ).then((response)=>{
                this.hide = false;
                this.result = true;
            },function(response) {
                console.log(response);
            }
        )},
        close:function() {
            this.hide = true,
            this.type = '',
            this.name = '',
            this.quantity_box = '',
            this.box_pallet = '',
            //this.$refs.register_form.reset();
            this.result = false;
        }
    }

})

/*register_new_product = new Vue({
    el: '#register_new_product',
    data: {
        type: '',
        name: '',
        quantity_box: '',
        box_pallet: '',
    },
    methods: {
        registerproduct:function() {
            axios.post("index.php?url=register_product", {'type':this.type,'name':this.name,'quantity_box':this.quantity_box,'box_pallet':this.box_pallet}
            ).then((response)=>{
                this.result = true;
                this.result.type = this.type;
                //this.result.name = this.name;
                //this.result.quantity_box = this.quantity_box;
                //this.result.box_pallet = this.box_pallet;
                console.log(response.data);
            },function(response) {
                console.log(response);
            }
        )}
    }
})*/