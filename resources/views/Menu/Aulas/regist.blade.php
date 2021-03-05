<div class="" style="margin-left: 10%; margin-right: 10%;">
		<div class="">
	 		<input  type="text" wire:model="part_id">
	 		<input  type="text" wire:model="curso_id">
 		</div>
 			<label>Usuario:</label> &nbsp;&nbsp;&nbsp;
 				<span class="display-8"><i>debe contener: entre 5-10 caractes Alfa-numericos</i></span>	
			    @error('usuario')
					<label class="alert-danger">Usuario Obligatorio</label>
				@enderror
			    <input type="text" wire:model="usuario" class="form-control" autofocus><br>
			   
			    <label>Email:</label>
			    @error('email')
					<label class="alert-danger">Email Obligatorio</label>
				@enderror
			    <input type="text" wire:model="email" class="form-control" ><br>
			    <label>Password</label>&nbsp;&nbsp;&nbsp; 
			    	<span class="display-8"><i>debe contener: entre 5-10 caractes Alfa-numericos</i></span>	
			  
		<!-- 	    <input type="password" wire:model="password" class="form-control"> -->
			    <input id="password" type="password" name="password" wire:model="password" placeholder="Insert Password"  class="form-control" required>
				<input id="password-confirm" type="password" name="password_confirmation" wire:model="password_confirmation" placeholder="Confirmatión" class="form-control" required >
			     @if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif

            <div class="" align="center" >
                 <input wire:click="default"   class="btn btn-danger" value="Borrar" />
                 <input wire:click="saveregistro"  class="btn btn-warning" value="REGISTRARSE" />
            </div>
</div>