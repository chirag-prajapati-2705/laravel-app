<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link :to="{name:'dashboard'}" class="nav-link">Home <span class="sr-only">(current)</span></router-link>
                    </li>
                    <li class="nav-item active">
                        <router-link :to="{name:'register'}" class="nav-link">Register <span class="sr-only">(current)</span></router-link>
                    </li>
                    <li class="nav-item active">
                        <router-link :to="{name:'list'}" class="nav-link">List
                           <span class="sr-only">(current)</span></router-link>
                    </li>
                    <li class="nav-item active">
                        <router-link :to="{name:'map'}" class="nav-link">Map <span class="sr-only">(current)</span></router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name:"navigation",
    data(){
        return {
        
        }
    },
    methods:{
        
    }
}
</script>