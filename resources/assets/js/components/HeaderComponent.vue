<template>
    <nav class="navbar navbar-inverse navbar-fixed-top">
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
                    <li class="categories">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Modalidades <span class="caret"></span> 
                        </a>
                        <ul class="dropdown-menu">                            
                            <li class="dropdown-submenu" v-if="category.packages.length > 0" v-for="category in categories">
                                <a class="category dropdown-toggle" :category-slug="category.slug" tabindex="-1" href="#">
                                    {{ category.name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-caret-down"></span>
                                </a>
                                <ul class="dropdown-menu sub-menu" v-if="category.packages.length > 0" v-for="packages in category.packages"  >
                                    <li>
                                        <router-link :to="{ name:'packages.show', params: {slug: packages.slug, category: category.slug} }">
                                            {{ packages.name }}
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li v-else>
                                <router-link :to="{ name:'categories.show', params: {slug: category.slug} }">
                                    {{ category.name }}
                                </router-link>
                            </li> -->
                        </ul>
                    </li>
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
                            <li><a @click="redirect($event)" :href="painel">Dash</a></li>
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
        watch: {
            $route: function(to, from){
                var paramsTo = to.params;
                var paramsFrom = from.params;
                var dropdownSubMenu = $('body').find('.dropdown-menu');

                dropdownSubMenu.find('.dropdown-submenu a').each(function(i, v){
                    if($(this).attr('category-slug') != paramsTo.category){
                        $(this).find('span').addClass('fa-caret-down').removeClass('fa-caret-right');
                        $(this).find('ul').fadeOut('toggle');
                        $(this).find('.dropdown-submenu ul').fadeOut('toggle');
                    }else{
                        $(this).find('.sub-menu li > a').addClass('active');
                    }
                });

                if(window.innerWidth <= 768) {
                    $('body').find('#myNavbar').fadeOut(500, function(){
                        $(this).removeClass('in');
                        $(this).removeAttr('style');
                    });
                }   
            }
        },
        data: function(){
            return {
                packages: [],
                categories: [],
                painel: window.urlPainel+"?access_token="+JSON.parse(window.localStorage.getItem('authUser')).access_token
            }
        },
        methods: {
            redirect: function(el){
                const authUser = JSON.parse(window.localStorage.getItem('authUser'));
                //popup window
            },
            handleClickDropdown: function(){
                var vm = this.$el;
                $(this.$el).find('.dropdown-submenu a.category').on("click", function(e){

                    var el = $(this);
                    var ul = el.next('ul'); 

                    if(el.hasClass('open')){
                        el.removeClass('open');
                        el.find('span').addClass('fa-caret-down').removeClass('fa-caret-right');
                        ul.fadeOut('toggle');                        
                    }else{
                        
                        $(vm).find('.dropdown-submenu a.category').removeClass('open');
                        $(vm).find('.dropdown-submenu ul').fadeOut('toggle');
                        $(vm).find('.dropdown-submenu a span').addClass('fa-caret-down').removeClass('fa-caret-right');

                        el.find('span').removeClass('fa-caret-down').addClass('fa-caret-right');
                        el.addClass('open');
                                             
                        ul.fadeIn('toggle');
                    }
                    
                    e.stopPropagation();
                    e.preventDefault();
                });
            },
            getCategories: function(){
                axios.get('/categories', {}).then(response => {
                    if(response.status === 200){
                        this.categories = response.data;
                        setTimeout(() => {
                            this.handleClickDropdown();
                        }, 500);
                    }
                });
            },
            handleLogout: function(){
                this.$store.dispatch('clearAuthUser')
                window.deleteCookie('access_token');
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
        created: function(){
            
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

    /*.dropdown-open-hover:hover .dropdown-menu {
        display: block;
    }*/

    .dropdown-submenu {
        position: relative;
    }
    .dropdown-menu{
        padding: 0;
        background-color: #009a6e;
    }
 
    .dropdown-menu li a.category{
        padding: 20px;
    }

    .dropdown-menu > li > a{
        color: #000;
    }

    .dropdown-menu > li > a:focus{
        border: none;
    }

    .dropdown-menu > li > a:hover{
        background-color: #fff;
        color: #009a6e
    }

    .dropdown-menu li a.category:focus{
        border: none;
    }

    .dropdown-menu li a.category:hover{
        background-color: #fff;
        color: #009a6e
    }

    .dropdown-menu li a.open{
        text-decoration: none;
        color: #009a6e;
        background-color: #fff;
    }

    .dropdown-menu > li > a.active{
        background-color: #fff;
        color: #009a6e;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }

    @media (max-width: 768px) {
        .navbar-inverse .navbar-nav .open .dropdown-menu .sub-menu > li > a:focus{
            color: #009a6e;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu .sub-menu > li > a:hover{
            color: #009a6e;
        }
       
        .dropdown-menu .sub-menu{
            padding-left: 10px;
        }
        .dropdown-menu .sub-menu > li > a{
            color: white !important;
        }
        .dropdown-menu li a.open{
            color: #009a6e !important;
            background-color: transparent;
        }
    }
</style>
