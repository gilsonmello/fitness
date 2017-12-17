<template>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <router-link class="navbar-brand" to="/">Miranda Fitness</router-link>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <router-link tag="li" :to="{ name: 'home' }">
                        <a>Home</a>
                    </router-link>                               
                    <router-link tag="li" class="dropdown-open-hover" :to="{ name: 'categories.index' }">
                        <a>Modalidades</a>
                        <ul class="dropdown-menu" v-if="this.categories.length > 0">
                            <li v-for="categories in this.categories">
                                <router-link :to="{ name: 'categories.show', params: { slug: categories.slug } }">
                                    {{ categories.name }}
                                </router-link>
                            </li>
                        </ul>
                    </router-link>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li >
                        <form class="navbar-form navbar-left">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" placeholder="Search"> -->
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>

                    <li class="dropdown" v-if="User.authUser !== null && User.authUser.access_token">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Área do cliente
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/painel/">Dash</a></li>
                        </ul>
                    </li>

                    <li v-else>
                        <router-link :to="{ name: 'users.create' }">
                            <span class="glyphicon glyphicon-user"></span> Cadastre-se
                        </router-link>
                    </li>

                    <li v-if="User.authUser !== null && User.authUser.access_token">
                        <a href="#" v-on:click.prevent="handleLogout()">
                            <span class="glyphicon glyphicon-log-in"></span> Sair
                        </a>
                    </li>
                    <li v-else>
                        <router-link :to="{ name: 'login' }">
                            <span class="glyphicon glyphicon-log-in"></span> Login
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    import {mapState} from 'vuex'
    export default {
        computed: {
            ...mapState({
                User: state => state.Users
            })
        },
        components: {
            
        },
        data: function(){
            return {
                packages: [],
                categories: []
            }
        },
        methods: {
            getCategories: function(){
                axios.get('/categories', {}).then(response => {
                    if(response.status === 200){
                        this.categories = response.data;
                    }
                });
            },
            handleLogout: function(){
                this.$store.dispatch('clearAuthUser')
                window.localStorage.removeItem('authUser')
                this.$router.push({name: 'home'})
            },
            handleClickPackages: function(){
                if(this.packages.length == 0){
                    axios.get('/packages', {}).then(response => {
                        if(response.status === 200){
                            this.packages = response.data;
                        }
                    });
                }
            }
        },
        mounted: function(){
            this.getCategories();
        }
    }
</script>

<style type="text/css">
    .navbar-inverse{
        background-color: #000;
    }
    .navbar-inverse .navbar-nav > li > a{
        color: #009a6e;
    }
    .navbar-inverse .navbar-brand{
        color: #009a6e;
    }
    .navbar{
        border-radius: 0;
    }

    .dropdown-open-hover:hover .dropdown-menu {
        display: block;
    }
</style>
