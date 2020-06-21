app = new Vue({
    el:'#app',
    data: {
        name:'',
        prueba: ["hola","hola","hola","hola","hola",],
    },
    methods: {
        hola: function(i) {
            this.name = i;
        },
      
    }
})