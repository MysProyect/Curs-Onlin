@extends('layouts.appAdmin')
@section('title','- Section Admin')
@section('content')

<div class="title" >
	<small>Welcome Section Admin</small>
</div>
	<p >Courses | Participants | Responsible | Inscription | Virtual Class | User | Reports</p>
	
           
<div class="input-group" style="margin-top:5%; margin-left: 5%; margin-right: 5%;">	

<!-- RESPONSABLS -->
	 <div class="tool-enl" title="Responsabls">
	    <a href="{{ route('resp-livew')}}" >
			<img src="{{asset('images/resp.png')}}" width="200" height="300" ><br>
			Responsibles
		</a>	
	 </div>
	  
<!-- PARTICIPANTS -->	
   <div class="toll-enl">
		<a href="{{ route('part-livew') }}" title="Participants">
			<img src="{{asset('images/participants.jpg')}}" width="400" height="300" style="opacity: 0.3"><br>
			Participants
		</a>
	</div>	

<!-- USERS -->
	<div class="toll-enl"> 
			<a href="{{ route('AdmUser') }}" title="Usuarios">
			<img src="{{asset('images/loguear.jpeg')}}" width="400" height="300" style="opacity: 0.3"><br>
			Users
		</a>                           	  
	</div>

</div>


<div class="input-group" style="margin-top:5%; margin-left: 2%; margin-right: 2%;">
<!-- CURSOS -->
	<div  class="toll-enl" title="Cursos" >
		<a href="{{ route('cursos') }}"> 
		<img src="{{ asset('images/cursos-online.jpeg') }}"  class="tool-img"> <br>
		 <span class="display-4">Courses</span>
		</a>
	</div>

<!-- INSCRIPTION-->	
   <div class="toll-enl" title="valid Inscription">
		<a href="{{ route('insc-auth') }}">
			<img src="{{ asset('images/list-inscrip.png')}}" class="tool-img-2"><br>
			<span>Inscription<br>Valid/imprimir</span>
		</a>
	</div>

<!-- Virtual Class  -->
	<div class="toll-enl" title="entrar al Aula Virtual">
		<a href="{{ route('class')}}"> 
			<img src="{{ asset('images/aula-virtual.png')}}" class="tool-img"  ><br>
			<span>Aula Virtual</span>
		</a> 
	
	</div> 

</div>


		


	   	
	
	
	
	
@endsection
