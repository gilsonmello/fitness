@extends('layouts.frontend.app')

@section('content')
	<div class="featured-blocks">
        <div class="container">
            <div class="row-fluid">
                <div class="span4">
                    <div class="block">
                        <div class="icon">
                        	<i class="fw-icon-user"></i>
                        </div>
                        <h1>ipsum dolor sit amet</h1>
                        <p>Pellentesque lacinia mi nisi, id auctor sem ornare sed. Vivamus vitae facilisis metus. Praesent placerat enim velit</p>
                        <a href="#myModal" role="button" class="btn" data-toggle="modal">pop up</a>
                    </div>
                </div>
                <div class="span4">
                    <div class="block">
                        <div class="icon">
                        	<i class="fw-icon-flag"></i>
                        </div>
                        <h1>Sed placerat leo</h1>
                        <p>Jolentesque lacinia mi nisi, id auctor sem ornare sed. Vivamus vitae facilisis metus. Praesent placerat enim velit</p>
                        <a href="#myModal" role="button" class="btn" data-toggle="modal">pop up</a>
                    </div>
                </div>
                <div class="span4">
                    <div class="block">
                        <div class="icon">
                        	<i class="fw-icon-camera"></i>
                        </div>
                        <h1>Pellen tesque lacinia</h1>
                        <p>Curinentesque lacinia mi nisi, id auctor sem ornare sed. Vivamus vitae facilisis metus. Praesent placerat enim velit</p>
                        <a href="#myModal" role="button" class="btn" data-toggle="modal">pop up</a>
                    </div>
                </div>
            </div>
        	<div class="row-fluid">
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	          	<h2>Pellen tesque lacinia</h2>
		          	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis sed mauris a accumsan. Phasellus quis scelerisque lacus. Aenean nec orci sit amet justo interdum ullamcorper eget eu diam. Integer dictum sem eu adipiscing cursus. Suspendisse posuere dui eu dignissim fermentum. .</p>
		          	<p>Phasellus adipiscing porttitor metus, eget commodo mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut hendrerit ante. Phasellus viverra ligula tortor, ut sodales elit tempus eu. Vestibulum mattis sed purus at laoreet. Proin mattis, ante vel adipiscing porttitor, orci elit venenatis nibh, at molestie tortor dolor sit amet urna.  .</p>
		        </div>
            </div>
        </div>
    </div>
    <div class="featured-heading">
        <div class="container">
            <ul class="grid effect-8" id="grid">
                <li>
                	<h1>Integer vitae est viverra elementum</h1>
            		<h2>Integer luctus vestibulum orci velpo</h2>
            	</li>
            </ul>
            <div class="h-divider">
                <div class="icon1"><i class="fw-icon-star"></i></div>
            </div>
            <div class="row-fluid">
                <ul class="grid effect-3" id="grid">
                    <li class="span6">
                        <div class="block">
			                <img src="{{ url('frontend/img/img1.png') }}" alt="">
			                <h1>ipsum dolor sit amet</h1>
			                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse auctor urna id justo adipiscing, vel egestas sem scelerisque. Sed sed nulla dignissim magna ultricies scelerisque. Duis suscipit tellus nisi, gravida hendrerit nisi feugiat vitae faliclisis metus placerat enim.</p>
			                <a href="#" class="btn">More</a>
		            	</div>
                    </li>
                    <li class="span6">
                        <div class="block">
			                <img src="{{ url('frontend/img/img1.png') }}" alt="">
			                <h1>Vivamul dolorem inputions quinto</h1>
			                <p>Jolem aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse auctor urna id justo adipiscing, vel egestas sem scelerisque. Sed sed nulla dignissim magna ultricies scelerisque. Duis suscipit tellus nisi, gravida hendrerit nisi feugiat vitae faliclisis metus placerat enim.</p>
			                <a href="#" class="btn">More</a>
		            	</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="featured-images">
        <div class="container">
            <h1>In eget augue eget mauris</h1>
            <h2>Lorem luctus vestibulum</h2>
            <div class="hh-divider"></div>
            
            <div class="row-fluid">
                <ul class="grid effect-3" id="grid">
                    <li class="span2">
                        <div class="user-info">
                            <img src="{{ url('frontend/img/img3.png') }}" alt="">
                            <h1>John doe</h1>
                            <p class="last">Duis suscipit tellus nisi, gravida hendrer</p>
                            <ul>
                                <li><a href="#"><i class="fw-icon-facebook"></a></i></li>
                                <li><a href="#"><i class="fw-icon-twitter"></a></i></li>
                            </ul>
                        </div>
                    </li>
                    <li class="span2">
                        <div class="user-info">
                        <img src="{{ url('frontend/img/img4.png') }}" alt="">
                        <h1>Amada</h1>
                        <p class="last">Duis suscipit tellus nisi, gravida hendrer</p>
                        <ul>
                            <li><a href="#"><i class="fw-icon-facebook"></a></i></li>
                            <li><a href="#"><i class="fw-icon-twitter"></a></i></li>
                        </ul>
                    </div>
                    </li>
                    <li class="span2">
                        <div class="user-info">
                        <img src="{{ url('frontend/img/img5.png') }}" alt="">
                        <h1>Peter</h1>
                        <p class="last">Duis suscipit tellus nisi, gravida hendrer</p>
                        <ul>
                            <li><a href="#"><i class="fw-icon-facebook"></a></i></li>
                            <li><a href="#"><i class="fw-icon-twitter"></a></i></li>
                        </ul>
                    </div>
                    </li>
                    <li class="span2">
                        <div class="user-info">
                        <img src="{{ url('frontend/img/img6.png') }}" alt="">
                        <h1>Kate</h1>
                        <p class="last">Duis suscipit tellus nisi, gravida hendrer</p>
                        <ul>
                            <li><a href="#"><i class="fw-icon-facebook"></a></i></li>
                            <li><a href="#"><i class="fw-icon-twitter"></a></i></li>
                        </ul>
                    </div>
                    </li>
                    <li class="span2">
                        <div class="user-info">
                        <img src="{{ url('frontend/img/img7.png') }}" alt="">
                        <h1>Johny</h1>
                        <p class="last">Duis suscipit tellus nisi, gravida hendrer</p>
                        <ul>
                            <li><a href="#"><i class="fw-icon-facebook"></a></i></li>
                            <li><a href="#"><i class="fw-icon-twitter"></a></i></li>
                        </ul>
                    </div>
                    </li>
                    <li class="span2">
                        <div class="user-info">
                        <img src="{{ url('frontend/img/img8.png') }}" alt="">
                        <h1>winslet</h1>
                        <p class="last">Duis suscipit tellus nisi, gravida hendrer</p>
                        <ul>
                            <li><a href="#"><i class="fw-icon-facebook"></a></i></li>
                            <li><a href="#"><i class="fw-icon-twitter"></a></i></li>
                        </ul>
                    </div>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>
@endsection
