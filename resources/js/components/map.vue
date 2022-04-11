<template>
<div>
<navigation></navigation>
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=72.31956481933595%2C22.873328288300865%2C72.7727508544922%2C23.13152007723789&amp;layer=mapnik&amp;marker=23.002511881877204%2C72.5463191" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=23.0025&amp;mlon=72.5463#map=12/23.0025/72.5463">View Larger Map</a></small>
</div>
</template>

<script>
import navigation from './Layouts/Navigation.vue'
export default {
    name:'map-view',
    data(){
        return {
          success_message:'',
          error:''
        }
    },

   components: {navigation},
    methods:{
      
  
    }
    
}
</script>
<style scoped>
.hasError{
  border-color:red;
}
</style>