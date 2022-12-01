const { createApp } = Vue
const app = createApp({
    data() {
        return {
            todos: [],
            newtask: '',

        }

    },
    methods: { //chiamata del API 
        chiamataAxios() { //mettere il percorso da index non da script
            axios.get('server.php').then((response) => {
                // console.log(response.data)
                this.todos = response.data
            })
        },
        addtask() {
            const data = { 'newTask': this.newtask };
            // console.log(data);
            axios.post('./server.php', data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                this.chiamataAxios()

            })
        },
        fatto(index) {
            const data = { 'done': index };
            // console.log(data);
            axios.post('./server.php', data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                this.chiamataAxios()
                // console.log(response.data)
            })
        }



    },
    mounted() {
        //risposta api
        this.chiamataAxios()
    },
})
app.mount('#app')