const { createApp } = Vue
const app = createApp({
    data() {
        return {
            todos: [],

        }

    },
    methods: { //chiamata del API 
        chiamataAxios() { //mettere il percorso da index non da script
            axios.get('server.php').then((response) => {
                console.log(response.data)
                this.todos = response.data
            })
        }


    },
    mounted() {
        //risposta api
        this.chiamataAxios()
    },
})
app.mount('#app')