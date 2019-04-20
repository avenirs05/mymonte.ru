<template>
    <v-content>    
        <v-layout>
            <div>Content To Edit</div>  
        </v-layout>  
    </v-content>
</template>


<script>  
    export default { 
        mounted() { 
            this.load()
        },   
        props: [
            
        ],
        
        data: () => ({
        
        }),
        
        methods: {
            load() {
                axios.get(route("admin-contents-index"))
                    .then(response => {
                        console.log(response)
                    })
            }
        }
    }
</script>


<style>

</style>