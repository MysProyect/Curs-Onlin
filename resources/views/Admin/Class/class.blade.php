<div>
	<label class="title">Administrar Class Virtual</label>
 	@if (session('mensaje'))
		<div class="alert alert-success">             
			{{ session('mensaje') }}
		</div>
	@endif

	<a href="" class="nav-link display-6">Listar clases</a>

    <div  class=" form-gruop display-6" style="width: 100%; margin-top: 8%;">
	
	<div style="display: flex; ">

		<div>
			<select wire:model="curso_id" class="text-success">
		 		<option value="">Seleccione el curso</option>
		 		@foreach($cursos as $curso)
		 			@if($curso->statud == 1)
		 				<option value="{{$curso->id}}">{{$curso->title}}</option>
		 			@endif
		 		@endforeach
		 	</select>
		 		<div class="form-group">
		<label class="display-5">Seccion
			<select wire:model="seccion" class="text-success form-control-lg" wire:change="verif">
				<option value="">Nª</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</label>
			  @error('seccion')
			   	<small class="alert alert-danger">indique la seccione</small> 
			  @enderror
	</div>
			<!-- @error('curso_id')
				<label class="alert alert-danger">Seleccione el curso</label>
			@enderror -->
		</div>
		<div style="margin-left: 5%;">
			@if($curso_id)
		   		<img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs-2"/>  
			@else
				<img src="{{asset('images/cursos-online.jpeg')}}">
			@endif
		</div>
	</div>
	

	@if($mensaj)
		
		<div>
			<small class="text-danger display-5">Esta seccion ya ha sido creada,</small>
			<span class="text-success display-6"> desea actualizarla?</span>
		<div align="center">
			<button class="btn btn-primary bt-lg" wire:click="edit">SI</button>
			<input type="button" class="btn btn-warning" value="Dejar como esta" wire:click="dejar">
		</div>
	@endif
	@if($create)
		@include('Admin.Class.create')
	@endif

	@if($edit)
		@include('Admin.Class.edit')
	@endif


</div>
</div>