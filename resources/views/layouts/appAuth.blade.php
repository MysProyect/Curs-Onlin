<!DOCTYPE html>
<html lang="es-ES" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ASTUDILLO'S GROUP @yield('title')</title>

   
    
   <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
   <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
   </head>	
<body>    
<header> 
	<div>
		<video   autoplay loop muted >
			<source src="{{ asset('images/Header.mp4') }}" type="video/mp4">
		</video>
	</div>  
</header> 	
		


<div  class="cont">		
		<div class="IrHome" style="margin-top:2%;">
			<a href="{{ route('welcome') }}" title="Inicio" ><img src="{{ asset('images/inicio.png') }}" width="100" height="120"></a>
		</div>		
	 <div  class="container-app"  >
		  @yield('content')     
	 </div>
	   
	
	 <div class="bar-left" > 
		 <div style="font-size:14px; display:flex;"> 
		        	@if (Auth::user())  
			 
				<a href="{{ route('welcome')}}"  style="color: #0000FF; font-size:16px; padding-right:10px;" data-toggle="dropdown" role="button" aria-expanded="false">
				<?php echo  (strtoupper (Auth::user()->username) )?></a>
				    
					@if ((Auth::user()->privileges) === 1)
					      <div align="center" >
							<a href="{{ route('AdmUser') }}" class=""style="font-size:16px; ">
							<img src="{{ asset('images/ajustes.png') }}" width="30" height="35" >  Adm > Usuarios | Cursos | Participants</a>
						 </div>
				   @endif	
				   
				<ul class="dropdown-menu" role="menu"><!--dejo abierto 'ul' -->
				<li>
					<a href="{{ route('logout') }}" class="salir" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Salir">Cerrar Seccion</a>
					<form id="logout-form" action="{{ route('logout') }} " method="POST">{{ csrf_field() }}  </form>
				</li>
								
			  @else 
				<a href="{{ route('login') }}"  style="color:#FFA500;"><img src="images/acceso.png">Acceder</a>
			  @endif   		    	
			</div>
		
	             <br><br>
			  <div>
				<a href="{{ route('AV-livew')}}"> <img src="{{ asset('images/av2.jpeg')}}" class="img-left" title="entrar al Aula Virtual"></a> 
			     <br><br>
		
				<a href="">  <img src="{{ asset('images/Asociados.png')}}" class="img-left" title="Asociados"></a>	
			</div>    	
	</div>
 
 </div>				












<footer>
	<div id="footer" align="center"> @ (2020) todos los derechos reservados		
		<a href="" ><img src="{{asset('images/Facebook.png')}}" width="60" height="50" style="float:right; margin-left:20px; opacity:0.5; "></a>
		<a href="" ><img src="{{asset('images/Twitter.png')}}" width="60" height="50" style="float:right; margin-left:20px;opacity:0.5;"></a>
		<a href=""><img src="{{asset('images/Messeger.png')}}" width="60" height="50" style="float:right; margin-left:20px; opacity:0.5;"></a>
	</div>
</footer>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>

