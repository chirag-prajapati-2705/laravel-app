<template>
<div>
<navigation></navigation>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">CREATE AN ACCOUNT</h1>
                        <hr/>
                        <div v-if="errors">
                        <ul class="alert alert-danger">
                            <li v-for="(value, key, index) in errors">{{ value[0] }}</li>
                        </ul>
                    </div>

                      <div class="alert alert-success" role="alert" v-if="is_success">
                         {{success_message}}
                        </div>

                        <form action="javascript:void(0)" @submit="register" class="row" method="post">
                            <div class="form-group col-12">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input type="text" name="name"
                                :class="{ 'hasError': $v.user.name.$error}" v-model="user.name" id="name" placeholder="Enter name" class="form-control">
                                  
                            </div>
                            <div class="form-group col-12">
                                <label for="phone" class="font-weight-bold">Phone</label>
                                <input type="text" :class="{'hasError': $v.user.phone.$error}" name="phone" v-model="user.phone" id="phone" placeholder="Enter phone number" class="form-control">

                            </div>
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" :class="{ 'hasError': $v.user.email.$error}" name="email" v-model="user.email" id="email" placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="address" class="font-weight-bold">Address</label>
                                <input type="text" :class="{ 'hasError': $v.user.address.$error}" name="address" v-model="user.address" id="address" 
                                placeholder="Enter Address" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" :class="{ 'hasError': $v.user.password.$error}" name="password" v-model="user.password" id="password" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password_confirmation" class="font-weight-bold">Confirm Password</label>
                                <input type="password" :class="{ 'hasError': $v.user.password_confirmation.$error}"
                                 name="password_confirmation" v-model="user.password_confirmation" id="password_confirmation" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" :disabled="processing" class="btn btn-primary btn-block">
                                    {{ processing ? "Please wait" : "Submit" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
import { required,sameAs, minLength } from 'vuelidate/lib/validators'

import navigation from '../components/Layouts/Navigation.vue'
export default {
    name:'register',
    data(){
        return {
            user:{
                name:"",
                email:"",
                phone:"",
                address:"",
                password:"",
                password_confirmation:"",
            },
            processing:false,
            errors:'',
            is_success:false,
            success_message:'dd'
        }
    },
      validations: {
        user:{
          name: {required},
          email: {required},
          phone: {required,minLength: minLength(10)},
          address: {required},
          password: {required},
          password_confirmation: {required, sameAsPassword: sameAs('password')}
        }
  },
    components: {navigation},
    methods:{
        resetForm: function () { 
              this.user.email = ''; 
              this.user.name = ''; 
              this.user.phone = ''; 
              this.user.address = ''; 
              this.user.password = ''; 
              debugger;
              this.user.password_confirmation = ''; 
        },
         register(){
            this.processing = true;
            this.$v.$touch()
            if(this.$v.$invalid){
             this.processing = false
              return false;
            }
             axios.post('/register',this.user).then(response=>{
                this.is_success = true;
                this.errors='';
                this.$v.user.$reset();
                this.success_message = response.data.message;
                this.resetForm();
                this.processing = false;

            }).catch(({response:{data}})=>{
               if(typeof data!='undefined')
               {
                 this.errors = data.errors;
               }
               this.processing = false;

            });
        }
    }
}
</script>
<style scoped>
.hasError{
  border-color:red;
}
</style>