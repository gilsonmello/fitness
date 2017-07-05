<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->

    <link href="{{url('frontend/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />


    <link href="{{ url('frontend/css/style.css') }}" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
    
    <script type="application/x-javascript"> 
        addEventListener("load", function() { 
            setTimeout(hideURLbar, 0); 
        }, false); 
        function hideURLbar(){ 
            window.scrollTo(0,1); 
        } 
    </script>
    <!--<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />-->
    <script src="{{url('frontend/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
                });
            });
    </script>
    <!-- grid-slider -->
    <script type="text/javascript" src="{{ url('frontend/js/jquery.mousewheel.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/jquery.contentcarousel.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/jquery.easing.1.3.js') }}"></script>

</head>
<body>

    <!-- start header_top -->
    <div class="header">
        <div class="container">
            <div class="header-text">
                <h1>Perfect Fitness</h1>
                <h2>Best Choice For your site</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna</p>
                <div class="banner_btn">
                    <a href="#">Read More</a>
                </div>
            </div>
            <div class="header-arrow">
                <a href="#menu" class="class scroll">
                <span> </span> </a>
            </div>
        </div>
    </div>
    
    <!-- end menu -->
    <div class="main">
        @yield('content')
    </div>

    <div class="footer-top">
        <ul class="twitter_footer">
            <li>
                <i class="twt_icon"> </i>
                <p>
                    aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel  <span class="m_6">2 days ago</span>
                </p>
                <div class="clear"></div>
            </li>
        </ul>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="row section group">
                <div class="col-md-4">
                   <h4 class="m_7">Newsletter Signup</h4>
                   <p class="m_8">Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam nonummy.</p>
                      <form class="subscribe">
                         <input type="text" value="Insert Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Insert Email';}">
                      </form>
                      <div class="subscribe1">
                        <a href="#">Submit Email<i class="but_arrow"> </i></a>
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="f-logo">
                        <img src="images/logo.png" alt=""/>
                    </div>
                    <p class="m_9">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis</p>
                    <p class="address">Phone : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">(00) 222 666 444</span></p>
                    <p class="address">Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">info[at]mycompany.com</span></p>
                </div>
                <div class="col-md-4">
                    <ul class="list">
                        <h4 class="m_7">Menu</h4>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Trainers</a></li>
                        <li><a href="#">Classes</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <ul class="list1">
                        <h4 class="m_7">Community</h4>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Newsletter</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
              </div>
            </div>
        </div>

    <div class="copyright">
        <div class="container">
            <div class="copy">
                <p>© 2014 Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
            </div>
            <div class="social">    
                <ul>    
                    <li class="facebook"><a href="#"><span> </span></a></li>
                    <li class="twitter"><a href="#"><span> </span></a></li>
                    <li class="pinterest"><a href="#"><span> </span></a></li>   
                    <li class="google"><a href="#"><span> </span></a></li>
                    <li class="tumblr"><a href="#"><span> </span></a></li>
                    <li class="instagram"><a href="#"><span> </span></a></li>   
                    <li class="rss"><a href="#"><span> </span></a></li>                         
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>



</body>
</html>
