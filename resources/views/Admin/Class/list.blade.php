 <div align="left" style="margin-left:60%;">
	<a wire:click="back" title="ir atras">
	   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
	</div>

	<br>
	<input type="text" class="search-input"  wire:model="searchPart"  placeholder="Buscar" >    
	<table class="table">   		
		<thead class="thead-dark"> 			
		<tr align="center">        			
			<th>Curso</th>
			<th>Class/Sections</th>
			<th>Accion</th>
		</tr>
		</thead>
		<tbody> 
		@foreach($clases as $class)    		
		<tr>
			@foreach($cursos as $curso)
				@if($curso->id == $class->curso_id)
					<td>{{ $curso->title }}</td>
				@endif
			@endforeach
			
			<td align="center"> 
			<?php $i=0; ?>
			@foreach($clasSec as $cs) 				
				@if($class->id == $cs->class_id)					
					<?php $i=$i+1; ?>
				@endif
			@endforeach
			<?php echo $i; ?>
			</td>
			<td align="center">

				<button wire:click="" class="btn btn-info">editar | ver</button>
                 


			</td>
		</tr>

		@endforeach
      </tbody>
      </table>

<br><br>
	<label>No hay registros</label>

