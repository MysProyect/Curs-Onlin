<div align="center">

<label class="display-6 text-primary">{{$clase_name->title}}</label><br>
@foreach($lecns as $lec)    		
				
	<ul>
		<li>leccion {{$lec->leccion}}</li>
	</ul>
	
@endforeach

</div>