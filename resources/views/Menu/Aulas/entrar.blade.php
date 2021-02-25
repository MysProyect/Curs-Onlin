<div>

	<div  class=" form-gruop display-5" style="margin-top: 10%;">
		@if (session('mensaje'))
			<div class="alert alert-success">             
				{{ session('mensaje') }}
			</div>
		@endif
		@if (session('alert'))
			<div class="alert alert-danger">             
				<small>{{ session('alert') }}</small>
			</div>
		@endif<br>
		Indique el Curso: 
		<select wire:model="curso_id" class="text-success">
		 	<option value="">SELECCIONE</option>
		 		@foreach($cursos as $curso)
		 			@if($curso->statud == 1)
		 				<option value="{{$curso->id}}">{{$curso->title}}</option>
		 			@endif
		 		@endforeach
		 </select>
		@error('curso_id')
			<label class="alert-danger">Seleccione el curso</label>
		@enderror
	</div>
	@if($curso_id)
		<div class="form-gruop text-center" style="display: block; margin-top: 2%;">
			<i>Esta registrado atos en el <b>aula virtual </b> del curso seleccionado?</i><br>
			<button wire:click="InicSeccion({{ $curso_id }})" class="btn btn-primary">Si</button>
			<button wire:click="registro({{ $curso_id }})" class="btn btn-success">No</button>
		</div>
	@endif


	@if($reg)
	    @include('Menu.Aulas.registro')
	@endif

	@if($acceder)
	    @include('Menu.Aulas.acceder')
	@endif

	</div>

