<template>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      	<li data-target="#myCarousel" data-slide-to="1"></li>
	      	<li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

		<!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">
	      	<div class="item active">
		        <img src="/img/slider-1.jpg" style="height: 300px; width:100%;" alt="New York" height="300">
		        <div class="carousel-caption">
		          	<h3>New York</h3>
		          	<p>The atmosphere in New York is lorem ipsum.</p>
		        </div>      
	      	</div>

	      	<div class="item">
		        <img src="/img/slider-2.jpg" style="height: 300px; width:100%;" alt="Chicago" height="300">
		        <div class="carousel-caption">
		          	<h3>Chicago</h3>
		          	<p>Thank you, Chicago - A night we won't forget.</p>
		        </div>      
	      	</div>
		    
	      	<div class="item">
		        <img src="/img/slider-3.jpg" style="height: 300px; width:100%;" alt="Los Angeles" height="300">
		        <div class="carousel-caption">
		          	<h3>LA</h3>
		          	<p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p>
		        </div>      
	      	</div>
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	      	<span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      	<span class="sr-only">Next</span>
	    </a>
	</div>


</template>
<script>
	export default {

	}
</script>