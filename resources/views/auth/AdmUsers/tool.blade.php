@extends('layouts.appAuth')
@section('title','- Usuarios ')
@section('content')

<div class="title" ><b>Usuario | Cursos | Paticipantes</b></div>
	
             <!-- CURSOS -->
<div class="toll" style="margin-top:10%;">	
	
	<div  style="margin-right:5%;">
		<img src="{{ asset('images/cursos-online.jpeg') }}"  width="500" height="300"/> <br>
		<a href="{{ route('cursos') }}" style="font-size:24px;">  
				Click aqui</a> para entrar a la seccion de cursos
	</div>
	
	      <a href="{{ route('resp-livew')}}">Responsables</a>
	
	   <!-- PARTICIPANTS -->
	
   <div  style="font-size:20px; text-align:center; margin-right:5%;" >
		<a href="{{ route('participants') }}">
			<img src="{{asset('images/participants.jpg')}}" width="400" height="300" style="opacity:0.5;"><br>
			Participants
		</a>
	</div>



	
	
</div>
	<!-- USUARIOS -->
	<div style=" margin-top:10%;">
		  @if (session('mensaje'))
			<div class="alert alert-success">             
				{{ session('mensaje') }}
			</div>
		 @endif
		 <label style="" align="center">
			<a href="{{ route('register') }}">
				<img src="{{ asset('images/bt-new.jpg') }}" class="img-bt-new">
				<img src="{{asset('images/loguear.jpeg')}}" class="img-bt-user"> 					
			</a> 				
		</label>
		<table class="table table-striped" >
				<thead class="thead-dark">
					<tr>      
						<th scope="col">Usuario</th>
						<th scope="col">Nombres</th>
						<th scope="col">Privilegios</th>
					</tr>
				</thead>			
			@foreach($users as $item)
				<tbody> 
					<tr style="">   
						<td style="text-align: center;" ><a href="{{route('ver', $item)}}"><?php echo (strtoupper($item->username)) ?></a></td>  
						<td scope="row">{{$item->name}}  {{ $item->last_name }}</td>    
						@if($item->privileges === 1) 
							 <td style="text-align: center;">Aministrador</td> 
						@endif
						@if($item->privileges === 2) 
							 <td style="text-align: center;">Super Usuario</td> 
						@endif
						@if($item->privileges === 3) 
							 <td style="text-align: center;">Invitado</td> 
						@endif 			  
					</tr>				
				</tbody>
			@endforeach
		</table> 
		<label>{{ $users->links()}}</label>                              	  
			
	</div>
		

	
	
	
@endsection
