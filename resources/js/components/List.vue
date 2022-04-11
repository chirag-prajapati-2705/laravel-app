<template>
<div>
<navigation></navigation>
<section class="pb-5 header text-center">
    <div class="container py-5">
        <header class="py-5">
            <h1 class="display-4">User Listing</h1>
        </header>

        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <div class="alert alert-success" role="alert" v-if="success_message !=''">
                         {{success_message}}
                        </div>
                        <div class="alert alert-danger" role="alert" v-if="error !=''">
                          {{error}}
                        </div>
                        <!-- Responsive table -->
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="user in getUsers()" :key="user.message">
                                        <th scope="row">{{user.name}}</th>
                                        <td>{{user.email}}</td>
                                        <td>{{user.phone}}</td>
                                        <td>{{user.address}}</td>
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <router-link v-bind:to="{name: 'user-detail', params: { user_id: user.id }}"> View </router-link>                                                <li class="list-inline-item" v-on:click="deleteUser(user.id)">
                                                    <i class="bi-trash"></i>
                                                </li>
                                                    		  
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

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
    name:'user-list',
    data(){
        return {
          success_message:'',
          error:''
        }
    },

   components: {navigation},
    methods:{
      getUsers(){
        return this.$store.state.user.users;
      },
      deleteUser(id){
        this.$store.dispatch('user/deleteUser',{id: id}).then(({ data }) => {
            if(data.success){
              this.success_message = data.message;
              this.$store.dispatch('user/getUsers');
            }else{
               this.error = data.message;  
            }
            }).catch(({response:{data}})=>{
            this.error_message = data.message;
        })
      }
    },
      created(){
         this.$store.dispatch('user/getUsers');
      },
    
}
</script>
<style scoped>
.hasError{
  border-color:red;
}
</style>