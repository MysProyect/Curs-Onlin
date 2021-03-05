<div class=" text-success display-5" style="margin:2%; ">
    <span> {{$part->name}}&nbsp;{{$part->last_name}}</span>&nbsp;&nbsp;&nbsp;
		            &nbsp;&nbsp;              
	<img src="{{asset('images/icons/checked.jpg')}}" width="50" height="30" />   

	@if($UserAula)
				<label>Ya ha creado el Aula Virtual para este curso 
 				<a href="">
 					<br>
 					Olvido sus datos de acceso?
 				</a>
 			</label>
	@endif
    
</div>