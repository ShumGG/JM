admin_panel = new Vue({
    el: '#admin_panel',
    data: {
        user: '',
    },
    mounted() {
        this.get_user();
    },
    methods:{
        logout:function() {
            location.href = "index.php?url=logout";
        },
        register_new_product:function() {
           location.href = "index.php?url=new_product";
        },
        package_new_product:function() {
            location.href = "index.php?url=package_new_product";
        },
        see_actual_products:function() {
            location.href = "index.php?url=see_actual_products";
        },
        finished_products:function() {
            location.href = "index.php?url=finished_products";
        },
        waiting_products: function() {
            location.href = "index.php?url=waiting_products";
        },
        get_user:function() {
            axios.get("index.php?url=get_user").then((response) => {
                this.user = response.data;
            });
        }
    }
})