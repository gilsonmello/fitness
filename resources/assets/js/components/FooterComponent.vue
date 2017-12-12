<template>
	<footer class="container">
		<div class="row">
			<div class="col-lg-4">
				<h1 class="page-header">
					Miranda Fitness
				</h1>
				<a class="btn btn-social-icon btn-facebook">
					<i class="fa fa-facebook"></i>
				</a>
				<a class="btn btn-social-icon btn-instagram">
					<i class="fa fa-instagram"></i>
				</a>
				<a class="btn btn-social-icon btn-twitter">
					<i class="fa fa-twitter"></i>
				</a>
				<a class="btn btn-social-icon btn-default btn-youtube">
					<i class="fa fa-youtube"></i>
				</a>
			</div>
			<div class="col-lg-4">
				<h1 class="page-header">
					Sobre
				</h1>
				<ul class="list-group">
					<li class="list-group-item">
						<router-link :to="{ name: 'aboutus' }">
							Sobre nós
						</router-link>
					</li>
					<li class="list-group-item">
						<router-link :to="{ name: 'login' }">
							Login
						</router-link>
					</li>
					<li class="list-group-item">
						<router-link :to="{ name: 'users.create' }">
							Cadastre-se
						</router-link>
					</li>
					<li class="list-group-item">
						<router-link :to="{ name: 'contactus' }">
							Contate-nos
						</router-link>
					</li>
				</ul>
				
			</div>
		</div>
	</footer>
		
</template>

<script>
    export default {
        
    }
</script>