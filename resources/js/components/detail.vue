<template>
<div>
<navigation></navigation>
<section class="pb-5 header text-center">
    <div class=" py-5">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">User Detail</h1>
                        <hr/>
                        <div class="form-group col-12">
                                <label class="font-weight-bold">Name:</label>
                                 {{getUsersDetail().name}}
                            </div>
                            <div class="form-group col-12">
                                <label class="font-weight-bold">Email:</label>
                                 {{getUsersDetail().email}}
                            </div>
                              <div class="form-group col-12">
                                <label class="font-weight-bold">Phone:</label>
                                 {{getUsersDetail().phone}}
                            </div>
                              <div class="form-group col-12">
                                <label class="font-weight-bold">Address:</label>
                                 {{getUsersDetail().address}}
                            </div>
                              <div class="form-group col-12">
                                <label class="font-weight-bold">Latitude:</label>
                                 {{getUsersDetail().latitude}}
                            </div>
                            <div class="form-group col-12">
                                <label class="font-weight-bold">Longitude:</label>
                                 {{getUsersDetail().longitude}}
                            </div>
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
    
    </div>
</template>

<script>
import navigation from './Layouts/Navigation.vue'
export default {
    name:'detail',
    data(){
        return {}
    },
   components: {navigation},
    methods:{
      getUsersDetail(){
        return this.$store.state.user.user;
      },
    },
    created(){
      this.$store.dispatch('user/getUserById',{id: this.$route.params.user_id}).then(({ data }) => {
        this.$store.commit('user/SET_USER',data.user)
      })
    },
    
}
</script>
<style scoped>
.hasError{
  border-color:red;
}
</style>