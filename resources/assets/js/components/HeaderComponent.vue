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
                    <li class="active">
                    <router-link to="/">Home</router-link></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Produtos 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <router-link to="/simples">Page 1-1</router-link>
                            </li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                    <form class="navbar-form navbar-left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" v-if="User.authUser !== null && User.authUser.access_token">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Área do cliente
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/painel/">Dash</a></li>
                            <li><a href="#">Extras</a></li>
                            <li><a href="#">Media</a></li> 
                        </ul>
                    </li>

                    <li v-else>
                        <router-link to="/users/create">
                            <span class="glyphicon glyphicon-user"></span> Cadastre-se
                        </router-link>
                    </li>

                    <li v-if="User.authUser !== null && User.authUser.access_token">
                        <a href="#" v-on:click.prevent="handleLogout()">
                            <span class="glyphicon glyphicon-log-in"></span> Sair
                        </a>
                    </li>
                    <li v-else>
                        <router-link to="/login">
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
        methods: {
            handleLogout: function(){
                this.$store.dispatch('clearAuthUser')
                window.localStorage.removeItem('authUser')
                this.$router.push({name: 'home'})
            }
        }
    }
</script>
