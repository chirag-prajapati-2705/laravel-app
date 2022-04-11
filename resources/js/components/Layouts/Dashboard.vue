<template>
    <div>
      <navigation></navigation>
      <div class="container py-5">
        <header class="py-5">
            <h1 class="display-4">Welcome to Vue js</h1>
        </header>
      </div>
    </div>
</template>

<script>
import navigation from './Navigation.vue'

export default {
    name:"dashboard-layout",
    data(){
        return {
        
        }
    },
       components: {navigation},

}
</script>