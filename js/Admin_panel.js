admin_panel = new Vue({
    el: '#admin_panel',
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
            location.href = "index.php?url=finished_products"
        }
    }
})