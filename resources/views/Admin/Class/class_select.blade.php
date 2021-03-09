<div  class=" form-gruop display-6" style="width: 100%; margin-top: 2%;">		
			<div style="display: flex;">
				<div class="">
					<select wire:model="curso_id" class="text-primary-2 form-control" wire:change="change_curso">
				 		<option value="">Seleccione el curso</option>
				 		@foreach($cursos as $curso)
				 			@if($curso->statud == 1)
				 				<option value="{{$curso->id}}">{{$curso->title}}</option>
				 			@endif
				 		@endforeach
				 	</select>
				 	<!-- @error('curso_id')
						<label class="alert alert-danger">Seleccione el curso</label>
					@enderror -->
					<br><br>
					<label class="display-5 text-primary">Seccion
						<select wire:model="seccion" class="form-control-lg" wire:change="verif">
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
					
				<div style="margin-left: 10%; float: right;">
					@if($curso_id)
				   		<img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs-2"/>  
					@else
						<img src="{{asset('images/cursos-online.jpeg')}}">
					@endif
				</div>

</div>