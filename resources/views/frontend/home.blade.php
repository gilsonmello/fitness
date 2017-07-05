@extends('layouts.frontend.app')

@section('content')
<div class="container">
	<!-- start content-top -->
	<div class="row content-top">
	 	<div class="col-md-5">
	  		<img src="{{url('frontend/images/pic.png')}}" class="img-responsive" alt=""/> 
		</div>
	 	<div class="col-md-7 content_left_text">
	   		<h3>Lorem ipsum dolor sit!</h3>
	   		<p>aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
	 	</div>
    </div>
</div>
<!-- end content-top -->
<div class="container">
    <div class="row content-middle">
      	<!-- start content-middle -->
    	<div class="col-md-4">
    		<a href="pricing.html">
	    		<ul class="spinning">
	    			<li class="live">live <span class="m_1">Spinning</span></li>
	    			<li class="room">Room 2</li>
	    			<div class="clear"></div>	
	    		</ul>
			 	<div class="view view-fifth">
			  	   	<img src="{{url('frontend/images/pic3.jpg')}}" class="img-responsive" alt=""/>
			      		<div class="mask">
	                   	<div class="info">Read More</div>
	              	</div>
	          	</div>
	     	</a>
	    </div>
	 	<div class="col-md-4">
	 		<a href="pricing.html">
	    		<ul class="spinning">
	    			<li class="live">live <span class="m_1">Gym</span></li>
	    			<li class="room">Room 1</li>
	    			<div class="clear"></div>	
	    		</ul>
			 	<div class="view view-fifth">
		  	   		<img src="{{url('frontend/images/pic2.jpg')}}" class="img-responsive"  alt=""/>
			      	<div class="mask">
                   		<div class="info">Read More</div>
              		</div>
              	</div>
	     	</a>
     	</div>
	 	<div class="col-md-4">
	 		<a href="pricing.html">
	    		<ul class="spinning">
	    			<li class="live">live <span class="m_1">Pilates</span></li>
	    			<li class="room">Room 4</li>
	    			<div class="clear"></div>	
	    		</ul>
			 	<div class="view view-fifth">
			  	   	<img src="{{url('frontend/images/pic1.jpg')}}" class="img-responsive" alt=""/>
			      	<div class="mask">
                   		<div class="info">Read More</div>
              		</div>
	          	</div>
 			</a>
		</div>
		<div class="clear"></div>
   	</div>
  	<!-- end content-middle -->
   	<div class="row about">
      	<div class="col-md-8">
     	 	<h3 class="m_2">All Classes</h3>
     	 	<div class="classes">
     	 		<div class="cardio_list">
	     	 	  	<div class="cardio_sublist">
			     	 	<ul class="cardio">
			     	 		<li><i class="clock"> </i><span>Cardio Fitness</span></li>
			     	 	</ul>
			     	 	<div class="social-media">
					     	<ul>
					       	 	<li> <span class="simptip-position-bottom simptip-movable" data-tooltip="timetable"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Send to"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="like it"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="share"><a href="#" target="_blank"> </a></span></li>
						    </ul>
					   	</div>
			     	 	<div class="clear"></div>
	     	 	  	</div>
     	 	  		<div class="cardio_sublist">
			     	 	<ul class="cardio">
			     	 		<li><i class="clock"> </i><span>Spinning</span></li>
			     	 	</ul>
			     	 	<div class="social-media">
					     	<ul>
					        	<li> <span class="simptip-position-bottom simptip-movable" data-tooltip="timetable"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Send to"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="like it"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="share"><a href="#" target="_blank"> </a></span></li>
						    </ul>
					   	</div>
			     	 	<div class="clear"></div>
     	 	  		</div>
	     	 	  	<div class="cardio_sublist">
			     	 	<ul class="cardio">
			     	 		<li><i class="clock"> </i><span>Pilates</span></li>
			     	 	</ul>
			     	 	<div class="social-media">
					     	<ul>
						        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="timetable"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Send to"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="like it"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="share"><a href="#" target="_blank"> </a></span></li>
						    </ul>
					   	</div>
			     	 	<div class="clear"></div>
     	 	  		</div>
	     	 	   	<div class="cardio_sublist">
			     	 	<ul class="cardio">
			     	 		<li><i class="clock"> </i><span>Boxing</span></li>
			     	 	</ul>
			     	 	<div class="social-media">
					     	<ul>
					        	<li> <span class="simptip-position-bottom simptip-movable" data-tooltip="timetable"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Send to"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="like it"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="share"><a href="#" target="_blank"> </a></span></li>
						    </ul>
					   </div>
		     	 		<div class="clear"></div>
	     	 	  	</div>
     	 		</div>
     	 		<div class="cardio_list1">
	     	 	  	<div class="cardio_sublist">
			     	 	<ul class="cardio">
			     	 		<li><i class="clock"> </i><span>Aerobics</span></li>
			     	 	</ul>
			     	 	<div class="social-media">
					     	<ul>
						        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="timetable"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Send to"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="like it"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="share"><a href="#" target="_blank"> </a></span></li>
						    </ul>
					   	</div>
		     	 		<div class="clear"></div>
	     	 	  	</div>
	     	 	  	<div class="cardio_sublist">
			     	 	<ul class="cardio">
			     	 		<li><i class="clock"> </i><span>Kik Boxing</span></li>
			     	 	</ul>
			     	 	<div class="social-media">
					     	<ul>
						        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="timetable"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Send to"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="like it"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="share"><a href="#" target="_blank"> </a></span></li>
						    </ul>
				   		</div>
		     	 		<div class="clear"></div>
	     	 	  	</div>
	     	 	  	<div class="cardio_sublist">
			     	 	<ul class="cardio">
			     	 		<li><i class="clock"> </i><span>CrossFit</span></li>
			     	 	</ul>
			     	 	<div class="social-media">
					     	<ul>
						        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="timetable"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Send to"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="like it"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="share"><a href="#" target="_blank"> </a></span></li>
						    </ul>
					   	</div>
			     	 	<div class="clear"></div>
	     	 	  	</div>
	     	 	   	<div class="cardio_sublist">
			     	 	<ul class="cardio">
			     	 		<li><i class="clock"> </i><span>Yoga</span></li>
			     	 	</ul>
			     	 	<div class="social-media">
					     	<ul>
						        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="timetable"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Send to"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="like it"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="share"><a href="#" target="_blank"> </a></span></li>
						    </ul>
					   	</div>
			     	 	<div class="clear"></div>
	     	 	  	</div>
	     	 	</div>
     	 		<div class="clear"></div>
 	 		</div>
		</div>
		<div class="col-md-4">
		  	<h3 class="m_4">Membership Prices</h3>
		  	<div class="members">
		   		<h4 class="m_3">25% Discount of for all members</h4>
		   		<p>Discount on services and <br>treatments at the GymBase for<br> all membership cards holders.</p>
			   	<div class="btn1">
		    		<a href="#">More</a>
	       		</div>
		  	</div>
	    </div>
	    <div class="clear"></div>
	</div>
    <div class="row content_middle_bottom">
	  <div class="col-md-4">
        <h3 class="m_2">Our Trainers</h3>
         <div class="course_demo">
          <ul id="flexiselDemo3">	
			<li><img src="images/pic4.jpg" /><div class="desc">
				<h3>Lorem Ipsum<br><span class="m_text">Spinning</span></h3>
				<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
				<div class="coursel_list">
					<i class="heart1"> </i>
					<i class="like"> </i>
				</div>
				<div class="coursel_list1">
					<i class="twt"> </i>
					<i class="fb"> </i>
				</div>
				<div class="clear"></div>
			</div></li>
			<li><img src="images/pic5.jpg" /><div class="desc">
				<h3>Lorem Ipsum<br><span class="m_text">Kik Boxing</span></h3>
				<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
				<div class="coursel_list">
					<i class="heart2"> </i>
					<i class="like1"> </i>
				</div>
				<div class="coursel_list1">
					<i class="twt"> </i>
					<i class="fb"> </i>
				</div>
				<div class="clear"></div>
			</div></li>	
			<li><img src="images/pic4.jpg" /><div class="desc">
				<h3>Lorem Ipsum<br><span class="m_text">Spinning</span></h3>
				<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
				<div class="coursel_list">
					<i class="heart2"> </i>
					<i class="like1"> </i>
				</div>
				<div class="coursel_list1">
					<i class="twt"> </i>
					<i class="fb"> </i>
				</div>
				<div class="clear"></div>
			</div></li>	
			<li><img src="images/pic5.jpg" /><div class="desc">
				<h3>Lorem Ipsum<br><span class="m_text">Kik Boxing</span></h3>
				<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
				<div class="coursel_list">
					<i class="heart2"> </i>
					<i class="like1"> </i>
				</div>
				<div class="coursel_list1">
					<i class="twt"> </i>
					<i class="fb"> </i>
				</div>
				<div class="clear"></div>
			</div></li>	
			<li><img src="images/pic4.jpg" /><div class="desc">
				<h3>Lorem Ipsum<br><span class="m_text">Spinning</span></h3>
				<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
				<div class="coursel_list">
					<i class="heart2"> </i>
					<i class="like1"> </i>
				</div>
				<div class="coursel_list1">
					<i class="twt"> </i>
					<i class="fb"> </i>
				</div>
				<div class="clear"></div>
			</div></li>							    	  	       	   	    	
		</ul>
		<script type="text/javascript">
	$(window).load(function() {
		$("#flexiselDemo3").flexisel({
			visibleItems: 4,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 3000,    		
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
	    	responsiveBreakpoints: { 
	    		portrait: { 
	    			changePoint:480,
	    			visibleItems: 1
	    		}, 
	    		landscape: { 
	    			changePoint:640,
	    			visibleItems: 2
	    		},
	    		tablet: { 
	    			changePoint:768,
	    			visibleItems: 2
	    		}
	    	}
	    });
	    
	});
</script>
<script type="text/javascript" src="{{url('frontend/js/jquery.flexisel.js')}}"></script>
</div>
</div>
<div class="col-md-4">
	 <h3 class="m_2">Next Events</h3>
	 <div class="events">
	 	<div class="event-top">
 	 	<ul class="event1">
 	 		<h4>26 April, 2014</h4>
 	 		<img src="images/pic.jpg" alt=""/>
 	 	</ul>
 	 	<ul class="event1_text">
 	 		<span class="m_5">h.12.00-h.13.00</span>
 	 		<h4>Aerobics</h4>
 	 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,. </p>
 	 		<div class="btn2">
			   <a href="#">Reservation</a>
			</div>
 	 	</ul>
	 		<div class="clear"></div>
	 	</div>
	 	<div class="event-bottom">
 	 	<ul class="event1">
 	 		<h4>26 April, 2014</h4>
 	 		<img src="images/pic.jpg" alt=""/>
 	 	</ul>
 	 	<ul class="event1_text">
 	 		<span class="m_5">h.12.00-h.13.00</span>
 	 		<h4>Spinning</h4>
 	 		<p>Lorem ipsum dolor sit amet. </p>
 	 		<div class="btn2">
			   <a href="#">Reservation</a>
			</div>
 	 	</ul>
	 		<div class="clear"></div>
	 	</div>
	 </div>
</div>
<div class="col-md-4">
	 <h3 class="m_2">From the blog</h3>
	 <div class="blog_events">
	 	<ul class="tab-left1">
		<span class="tab1-img"><img src="{{url('frontend/images/pic7.jpg')}}" alt=""></span>
		<div class="tab-text1">
		 <p><a href="#">nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip</a></p>
		 <span class="m_date">25 April, 2014</span>
		</div>
		<div class="clear"></div>
	</ul>
	<ul class="tab-left1">
		<span class="tab1-img"><img src="{{url('frontend/images/pic6.jpg')}}" alt=""></span>
		<div class="tab-text1">
		 <p><a href="#">soluta nobis eleifend option congue nihil imperdiet doming id</a></p>
		 <span class="m_date">25 April, 2014</span>
		</div>
		<div class="clear"></div>
	</ul>
	<ul class="tab-last1">
		<span class="tab1-img"><img src="{{url('frontend/images/pic8.jpg')}}" alt=""></span>
		<div class="tab-text1">
		 <p><a href="#">quod mazim placerat facer possim assum. Typi non habent</a></p>
		 <span class="m_date">25 April, 2014</span>
		</div>
		<div class="clear"></div>
	</ul>
	 </div>
</div>
<div class="clear"></div>
</div>
	<div class="row about">
	 	<div class="col-md-8">
	 	 	<h3 class="m_2">Gallery</h3>
	 	 	<div id="ca-container" class="ca-container">
			    <div class="ca-wrapper">
		         	<div class="ca-item ca-item-1">
				   		<div class="ca-item-main">
							<div class="ca-icon"> </div>
							<div class="ca-icon1"> </div>
						</div>
				  	</div>
					<div class="ca-item ca-item-2">
						<div class="ca-item-main">
							<div class="ca-icon"> </div>
							<div class="ca-icon2"> </div>
						</div>
					</div>
					<div class="ca-item ca-item-3">
						<div class="ca-item-main">
							<div class="ca-icon"> </div>
							<div class="ca-icon3"> </div>
						</div>
					</div>
					<div class="ca-item ca-item-4">
						<div class="ca-item-main">
							<div class="ca-icon"> </div>
							<div class="ca-icon4"> </div>
				     	</div>
					</div>
					<div class="ca-item ca-item-5">
						<div class="ca-item-main">
							<div class="ca-icon"> </div>
							<div class="ca-icon5"> </div>
						</div>
					</div>
					<div class="ca-item ca-item-6">
						<div class="ca-item-main">
							<div class="ca-icon"> </div>
							<div class="ca-icon6"> </div>
						</div>
					</div>
					<div class="ca-item ca-item-7">
						<div class="ca-item-main">
							<div class="ca-icon"> </div>
							<div class="ca-icon7"> </div>
						</div>
					</div>
					<div class="ca-item ca-item-8">
						<div class="ca-item-main">
							<div class="ca-icon"> </div>
							<div class="ca-icon"> </div>
						</div>
					</div>
		    	</div>
		 	</div>
		    <script type="text/javascript">
				$('#ca-container').contentcarousel();
			</script>
	   	</div>
	   	<div class="col-md-4">
	   	 	<h3 class="m_2">Partner</h3>
		  	<ul class="partner">
			  	<li><img src="{{url('frontend/images/p6.png')}}" alt=""/></li>
			  	<li><img src="{{url('frontend/images/p5.png')}}" alt=""/></li>
			  	<li><img src="{{url('frontend/images/p4.png')}}" alt=""/></li>
			  	<li><img src="{{url('frontend/images/p3.png')}}" alt=""/></li>
			  	<li><img src="{{url('frontend/images/p2.png')}}" alt=""/></li>
			  	<li><img src="{{url('frontend/images/p1.png')}}" alt=""/></li>
	  	 		<div class="clear"></div>
		  	</ul>
	   	</div>
	   	<div class="clear"></div>
  	</div>
</div>
<div class="map">
			<iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=United+Kingdom&amp;aq=0&amp;oq=un&amp;sll=37.0625,-95.677068&amp;sspn=48.956293,107.138672&amp;ie=UTF8&amp;hq=&amp;hnear=United+Kingdom&amp;ll=55.378051,-3.435973&amp;spn=135.795411,68.554687&amp;t=m&amp;z=2&amp;output=embed"> </iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=United+Kingdom&amp;aq=0&amp;oq=un&amp;sll=37.0625,-95.677068&amp;sspn=48.956293,107.138672&amp;ie=UTF8&amp;hq=&amp;hnear=United+Kingdom&amp;ll=55.378051,-3.435973&amp;spn=135.795411,68.554687&amp;t=m&amp;z=2" style="color:#666;font-size:12px;text-align:left"> </a></small>
			<div class="opening_hours">
			 <ul class="times">
			 	<h3>Opening <span class="opening">Hours</span></h3>
			 	<li><i class="calender"> </i><span class="week">Monday</span><div class="hours">h.6:00-h.24:00</div>  <div class="clear"></div></li>
			 	<li><i class="calender"> </i><span class="week">Tuesday</span><div class="hours">h.6:00-h.24:00</div>  <div class="clear"></div></li>
			 	<li><i class="calender"> </i><span class="week">Wednesday</span><div class="hours">h.6:00-h.24:00</div>  <div class="clear"></div></li>
			 	<li><i class="calender"> </i><span class="week">Thrusday</span><div class="hours">h.6:00-h.24:00</div>  <div class="clear"></div></li>
			 	<li><i class="calender"> </i><span class="week">Friday</span><div class="hours">h.6:00-h.24:00</div>  <div class="clear"></div></li>
			 	<li><i class="calender"> </i><span class="week">Saturday</span><div class="hours">h.6:00-h.24:00</div>  <div class="clear"></div></li>
			 	<li><i class="calender"> </i><span class="week">Sunday</span><div class="hours">h.6:00-h.24:00</div>  <div class="clear"></div></li>
			    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet</p>
			 	<h4>Enjoy it!</h4>
			 </ul>
		    </div>
		 </div>
@endsection
