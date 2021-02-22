@extends('layouts.appAdmin')
@section('title','- Detalles')
@section('content')

<div class="listCurs">     
	<div class="title">
		<small><b>{{$ver->title}}</b></small>
	</div>
	<div align="center">	
		<img src=" {{ Storage::url("$ver->img")}}" alt="Imagen no encontada" class="img-curs-2"/>
	</div>
	<div>
  		<label class="display-6 text-center">{{$ver->description}}</label>
  	</div>
 	<div align="center">
	    @if($ver->duracion)
	        <small class="text-primary display-5 text-center">{{$ver->duracion}} de duration</small>
	    @endif
	    <br><br>
	    @if($ver->statud ==1)
			<label class="text-success">Published</label>
		@else
			<label class="text-muted">Sin publicard</label>
		@endif
  	</div>
</div>
  <div align="left" style="margin-left:60%;">
	<a href="{{ route('cursos') }}" title="ir atras">
	   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
	</div>
</div>
@endsection