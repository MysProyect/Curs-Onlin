@extends('layouts.appAdmin')
@section('title','- Cursos')
@section('content')

 <div class="title"><b> Registrar Curso</b></div><br>
 
	
		@if ($errors->has('login'))
			<span class="help-block">
				<strong>{{ $errors->first('login') }}</strong>
			</span>
		@endif    
	
	<div  class="container">		              
		<form class="form-horizontal" method="POST" action="{{ route('SaveCurso') }}" name="formulario" id="formulario" enctype="multipart/form-data" onsubmit="return confirm('¿confirmar si desea guardar?');">
			{{ csrf_field() }}
	           
			<div class="form-group">
				&nbsp;&nbsp; <label class="h4 text-primary">Nombre del curso:</label>
				<input type="text" name="title" value="{{ old('title') }}" class="form-control" autofocus 
					 autocomplete="on"required onchange="javascript:this.value=this.value.toUpperCase();">
					 @error('title')
						<span class="alert alert-danger">{{ $message }}</span>
			 		 @enderror
			</div>
			<div class="form-group">
				&nbsp;&nbsp; <label>Descripcion:</label>
				<textarea  name="description" placeholder="Description / Intent or purpose of the course" value="{{ old('description') }}">
				</textarea>
			</div>	
			<div>
				Abjuntar Imagen<input type="file" name="img" accept="image/png, .jpeg, .jpg, image/gif"/>
			  @error('img')
					<span class="alert alert-danger">{{ $message }}</span>
			  @enderror
			</div>
			<br>
			
			<div style="display:flex;font-weight:bold;">		
				<div class="resp" onclick="SelecDinam()" id="Resp">
					Facilitador(es):		
					<input type="radio" id="Resp" name="cant_resps" value="1" >Uno? 
					<input type="radio" id="Resp" name="cant_resps"  value="2">varios?					
				</div>	
					<div  align="center" class="Add-Resp" >
					Si responsable No esta en la lista de <a href="{{ route('resp-livew')}}" title="Responsibls">click aqui</a>

				</div>
			</div>	
	
	
	
    	<div id="uno" class="form-group" style="display:none; padding:10;"> 		
			<select name="resp_id">
				<option>Seleccione</option>
					@foreach($resp as $item)
						<option value="{{$item->id}}" >{{ $item->name }}{{ $item->last_name }}</option>
					@endforeach
				</select>
		</div>		
	 	<div id="mas" class="form-group" style="display:none;"><br>
			@foreach($resp as $item)
					<input type="checkbox" name="resp[]" value="{{$item->id}}"><strong>{{ $item->name }} {{ $item->last_name }}</strong>					
			@endforeach
        </div>
        
  
        
        
		<div class="form-group text-success">
			<h1> Duraccion<input type="text" name="duracion" size="10" placeholder="Ejem: 10 hrs">  </h1> 
        </div> <br><br><br>
        <div class="form-group">  
			Publicar<input type="radio" id="public" name="statud" value="1" onclick="Public()">Si 
			<input type="radio" id="public" name="statud"  value="0" onclick="Public()" >No
		</div>
         
         <input type="submit" name="btnsave" class=" tex-bt btn btn-primary btn-block" value="Guardar"/>
         <input type="reset" value="Cancelar" class="btn btn-danger bt-canc" >
 
	</form>
</div>

	        
<script src="{{ asset('js/SelcDinam.js') }}"></script>  
<script src="{{ asset('js/public.js') }}"></script>
<script src="{{ asset('js/forms.js') }}"></script>

@endsection


<style scoped>

/*.input{
		 font-family : inherit;
		 font-size   : 100%font-weight: bold;;
		 font-family : inherit;
		 
		 color:#0E7822;
		 -webkit-box-sizing: border-box; 
		 -moz-box-sizing: border-box;
          box-sizing: border-box;}*/
          
textarea{ width: 100%; 
		  color:#800080;
		 -webkit-box-sizing: border-box; 
		 -moz-box-sizing: border-box;
          box-sizing: border-box;
          font-weight: bold;
          padding:2%;}
</style>
