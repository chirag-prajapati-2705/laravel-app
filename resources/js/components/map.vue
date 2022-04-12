<template>
<div>
<navigation></navigation>
  <div id="map" style="width: 600px; height: 400px">

  </div>
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
      loadMap(){
        var users = this.$store.state.user.users;
        var map_address = [];
        for (var key in users) {
          if(users[key].latitude !='' && users[key].longitude !='')
          {
            map_address[key] =[users[key].address,users[key].latitude,users[key].longitude];
          }
        }          
        var planes = map_address;
        console.log(planes);
        var map = L.map('map').setView([-41.3058, 174.82082], 8);
        var mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,}).addTo(map);
        for (var i = 0; i < planes.length; i++) {
          if(!_.isUndefined(planes[i]))
          {
          var marker = new L.marker([planes[i][1],planes[i][2]])
                  .bindPopup(planes[i][0])
                  .addTo(map);
          }
        }
      }
    },
    beforeMount(){
        this.$store.dispatch('user/getUsers');

    console.log('beforeMounted');
    },
    mounted(){
        var $this = this;
        $this.loadMap();
    //setTimeout(function(){$this.loadMap()}, 2000);
   }
    
}
</script>
<style scoped>
.hasError{
  border-color:red;
}
</style>