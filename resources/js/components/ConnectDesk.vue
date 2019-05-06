<template>   
    <div class="connect-desk hidden-sm-and-down">
        <div>
            <i class="material-icons">phone</i>
            {{ phoneMain }}&nbsp;&nbsp;
            <small>Черногория</small>
        </div>
        <div>
            <i class="material-icons">phone</i>
            {{ phoneMain2 }}&nbsp;&nbsp;
            <small>Украина</small>
        </div>        
    </div>
</template>


<script>
    export default {
        props: ['phoneMain', 'phoneMain2'],
        data: () => ({  })
    }
</script>


<style scoped>
    .connect-desk {
        margin-left: 25px;
        margin-right: 9px;
    }    
    .material-icons {
        font-size: 12px;
    }
    

</style>