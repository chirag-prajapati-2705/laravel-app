<template>
<div>
<navigation></navigation>
<section class="pb-5 header text-center">
    <div class="container py-5">
        <header class="py-5">
            <h1 class="display-5">User Listing</h1>
        </header>

        <div class="row">
            <div class="col-lg-12 mx-auto">
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
                                                <router-link v-bind:to="{name: 'user-detail', params: { user_id: user.id }}"> 
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 16" aria-labelledby="view" role="presentation" class="fill-current"><path d="M16.56 13.66a8 8 0 0 1-11.32 0L.3 8.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95-.01.01zm-9.9-1.42a6 6 0 0 0 8.48 0L19.38 8l-4.24-4.24a6 6 0 0 0-8.48 0L2.4 8l4.25 4.24h.01zM10.9 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"></path></svg>  
                                                </router-link>                                             
                                                   <li class="list-inline-item delete-icon" v-on:click="deleteUser(user.id)">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-labelledby="delete" role="presentation" class="fill-current"><path fill-rule="nonzero" d="M6 4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6H1a1 1 0 1 1 0-2h5zM4 6v12h12V6H4zm8-2V2H8v2h4zM8 8a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1z"></path></svg>                                                </li>
                                                    		  
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
.list-inline-item.delete-icon
{
  cursor: pointer;
}
</style>