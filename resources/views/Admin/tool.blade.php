@extends('layouts.appAdmin')
@section('title','- Section Admin')
@section('content')

<div class="title" >
	<small>Welcome Section Admin</small>
</div>
	<p >Courses | Participants | Responsible | Inscription | Virtual Class | User | Reports</p>
	
           
<div class="input-group" style="margin-top:5%; margin-left: 5%; margin-right: 5%;">	

<!-- RESPONSABLS -->
	 <div class="tool-enl" align="center">
	    <a href="{{ route('resp-livew')}}" title="Responsabls">
			<img src="{{asset('images/resp.png')}}"class="img-tool-admin" ><br>
			Responsibles
		</a>	
	 </div>
	  
<!-- PARTICIPANTS -->	
   <div class="toll-enl">
		<a href="{{ route('part-livew') }}" title="Participants">
			<img src="{{asset('images/participants.jpg')}}" class="img-tool-admin" style="opacity: 0.3"><br>
			Participants
		</a>
	</div>	

<!-- USERS -->
	<div class="toll-enl"> 
			<a href="{{ route('AdmUser') }}" title="Usuarios">
			<img src="{{asset('images/loguear.jpeg')}}" class="img-tool-admin-2"  style="opacity: 0.3"><br>
			Users
		</a>                           	  
	</div>

</div>


<div class="input-group" style="margin-top:5%; margin-left: 2%; margin-right: 2%;">
<!-- CURSOS -->
	<div  class="toll-enl" title="Cursos" >
		<a href="{{ route('cursos') }}"> 
		<img src="{{ asset('images/cursos-online.jpeg') }}"  class="img-tool-admin-2"> <br>
		 <span class="display-4">Courses</span>
		</a>
	</div>

<!-- INSCRIPTION-->	
   <div class="toll-enl" title="valid Inscription">
		<a href="{{ route('insc-auth') }}" title="ver/validar inscripcion">
			<img src="{{ asset('images/list-inscrip.png')}}" class="img-tool-admin-2"><br>
			<span>Inscription<br>Valid/imprimir</span>
		</a>
	</div>

<!-- Virtual Class  -->
	<div class="toll-enl" title="entrar al Aula Virtual">
		<a href="{{ route('class')}}"> 
			<img src="{{ asset('images/aula-virtual.png')}}" class="img-tool-admin-2"  ><br>
			<span>Aula Virtual</span>
		</a> 
	
	</div> 

</div>


		


	   	
	
	
	
	
@endsection
