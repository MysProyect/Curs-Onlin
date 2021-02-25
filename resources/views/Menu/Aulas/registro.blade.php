<div class="" style="width: 50%; margin-left: 20%; margin-right: 20%;margin-top: 3%; borde:1px solid">
<!-- 	<img src="{{asset('images/reg.jpg')}}" /> -->
	<div class="form-group text-center">
		<input type="text" wire:model="cedula"  class="form-control" placeholder="Ingrese cedula de Identidad" autofocus required  onkeyUp="return ValNumero(this);" wire:change="verif({{ $curso_id }})"/>
		@error('cedula')
			<label class="alert-danger">Cedula Obligatoria</label>
		@enderror

		@if($part_id)
	        <div class="row text-success display-5" style="margin:2%; ">
	            <span> {{$name}}&nbsp;{{$last_name}}</span>&nbsp;&nbsp;&nbsp;
	            &nbsp;&nbsp;              
				<img src="{{asset('images/icons/checked.jpg')}}" width="50" height="30" />       
	       </div>
       @endif
	</div>

   


       @if($part_id === 0)
      	 <label class="display-3 text-center text-danger">Lo sentimos sus datos no estan registrados o no pertenecen al curso seleccionado!!</label>
       @endif

		@if($aulaExiste)
				<label>Ya ha creado el Aula Virtual para este curso 
 				<a href="">
 					<br>
 					Olvido sus datos de acceso?
 				</a>
 			</label>
 		@endif

 		@if($aulaExiste === 0)
 			<div class="form-group">
 				<div class="d-lg-none">
	 				<input  type="text" wire:model="part_id">
	 				<input  type="text" wire:model="curso_id">
 				</div>
 				<label>Usuario:</label>
			    @error('usuario')
					<label class="alert-danger">Usuario Obligatorio</label>
				@enderror
			    <input type="text" wire:model="usuario" class="form-control" ><br>
			   
			    <label>Email:</label>
			    @error('email')
					<label class="alert-danger">Email Obligatorio</label>
				@enderror
			    <input type="text" wire:model="email" class="form-control" ><br>
			    	Password <span class="notas"><i>debe contener: entre 5-10 caractes Alfa-numericos</i>
				</span>	
			  
		<!-- 	    <input type="password" wire:model="password" class="form-control"> -->
			    <input id="password" type="password" name="password" wire:model="password" placeholder="Insert Password"  class="form-control">
				<input id="password-confirm" type="password" name="password_confirmation" wire:model="password_confirmation" placeholder="Confirmatión" class="form-control" >
			     @if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
		 	</div>

		 	 <div class="row ">
            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                 <input wire:click="default"   class="btn btn-danger" value="Borrar" />
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                  <input wire:click="saveregistro"  class="btn btn-warning btn-block" value="REGISTRARSE" />
            </div>
        </div>
 		@endif

<!-- 
	  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div> -->





     












</div>