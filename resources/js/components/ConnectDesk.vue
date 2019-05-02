<template>   
    <div class="connect-desk hidden-sm-and-down">
        <div>
            <i class="material-icons">phone</i>
            {{ phoneMain }}&nbsp;&nbsp;
            <small>Украина</small>
        </div>
        <div>
            <i class="material-icons">phone</i>
            {{ phoneMain }}&nbsp;&nbsp;
            <small>Черногория</small>
        </div>        
    </div>
</template>


<script>
    export default {
        props: ['phoneMain'],
        data: () => ({  })
    }
</script>


<style scoped>
    .connect-desk {
        //padding-left: 24px;
        margin-left: 25px;
    }    
    .material-icons {
        font-size: 12px;
    }
    

</style>