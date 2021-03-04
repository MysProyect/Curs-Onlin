<div>
	<label class="text-center display-6 text-primary">{{$curso->title}}</label><br>
	<b>Seccion <b><label class="text-right display-5 text-success">{{$seccion}}</label>
	<div>
		@if($curso->img)
	   		<img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs-2"/> 
			@endif
	</div>
	<div class="form-2">	

		{{$edit_sect}}
	</div>
		
</div>
