<div style="display: flex;">
	<div>
		<h1 class="text-center">Lista de Clases</h1>
			<div  align="right">
				<a wire:click="back" title="ir atras">
			   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
			</div>


			<br>
			<table class="table">   		
				<thead class="thead-dark"> 			
				<tr align="center">        			
					<th>Courses</th>
					<th>lections</th>
				</tr>
				</thead>
				<tbody> 
					<?php $i=0; ?>
				@foreach($clases as $class)    		
				<tr>
					@foreach($cursos as $curso)
						@if($curso->id == $class->curso_id)
							<td>{{ $curso->title }}</td>
						@endif
					@endforeach
					
					<td align="center"> 
					@foreach($clasSec as $cs) 							
							<label><?php $i=$i+1; ?>										
					@endforeach
					<?php echo $i; ?>
					<img src="{{asset('images/icons/show.png')}}" wire:click="show_lec({{$class->id}})" style="cursor: pointer;">
					</td>
				</tr>

				@endforeach
		      </tbody>
		      </table>
		  </div>
      <div style="margin:5%; width: 30%;">
      	@if($show_lec)
			@include('Admin.Class.show-lec')
		@endif
      </div>
</div>

    