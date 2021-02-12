<div>
	<div style="display: flex;">
		<h1 class="title-curs" align="center">{{ $curso->title}}</h1>
		<img src="{{asset('images/reg.jpg')}}" class="img-insc">
	</div>
			

    @if (session('mensaje'))
		<div class="alert alert-danger">             
			<label>{{ session('mensaje') }}  </label>
		</div>
	@endif

	<div class="container">
		<input type="text" wire:model="curso_id" value="{{ $curso->id }}" style="visibility: hidden;">

		<div class="title-div">
			<small class="title-op" style="float: center;">Personal information</small><br>
			<div class="form-group">  				
				<input type="text" wire:model="cedula"  class="slideselector"   autofocus placeholder="Identification card"  onkeyUp="return ValNumero(this);" wire:change="verif"> 
					@error('cedula')
						<label class="alert-danger text-8">identification card obligatory | Invalid</label>
					@enderror
					  @if (session('alert'))
						<div class="alert alert-success">             
							<small>{{ session('alert') }}  </small>
						</div>
					  @endif
								</div>
			<div  class="form-group">
				<input type="text"   wire:model="name" class="form-control" autocomplete="on" placeholder="Name(s)" value="{{ old('name') }}"> 
					@error('name')
						<label class="alert-danger text-8">Enter name</label>
					@enderror        
				<input type="text" wire:model="last_name"class="form-control" autocomplete="on"  placeholder="Last name(s)" value="{{ old('last_name') }}">
					@error('last_name')
						<label class="alert-danger text-8">Provide at least one last name</label>
					@enderror
			</div> 
		</div>
		
		<br>

		<div class="title-div"> 
	   		<label class="title-op">Course | Payment</label> 
	   		<div class="form-group" style="display:flex;">
	   			<div>
	   				<img src="{{asset('images/Fpagos.png')}}" width="300" height="200" > 
	   			</div>
	   			<div style="display: block; padding-left: 10%;">	
		    		Payment method: 
						<select wire:model="meth_pago" class="form-control">
							<option value="">Please select</option>
							<option value="Credito">Credit Card</option>
							<option value="Transf">Transfer</option>   		
						</select>
						@error('meth_pago')
						<label class="alert-danger text-8">Select the payment method</label>
						@enderror
					<br><br>
		  		    	<div class="text-danger h4">
		  		    		Reference: 				  					  			
				  			<input type="text" wire:model="pago" class="refere" placeholder="referencia nª">
				  		</div>
				 
				  		@error('pago')
						<label class="alert-danger text-8">Indicate the reference.</label>
						@enderror
				</div>
			
			</div>
		</div>
		  	<br><br><br>
			<div class="title-div">
				<label class="title-op">Contact information</label>     		
				    <div class="info">   		 			
						<DIV>E-mail
							<input type="email" class="form-control" wire:model="email"  autocomplete="on" style=" font-size: 2rem;" > 
							@error('email')
							<label class="alert-danger text-8"> Invalid email</label>
							@enderror
						</DIV>
						<div>Phone
							<input type="text" class="form-control"  wire:model="telef"  autocomplete="on"  onkeyUp="return ValNumero(this);" >  
					    </div>
				        <div>
							<label>WhatsApp</label> 
							<input  type="text" wire:model="NroWp" class="form-control"  />
					    </div>     
					 </div>
			</div>
		

		  

	</div> 
	<br>
		<button wire:click="saveinsc" class="tex-bt btn btn-primary btn-lg btn-block" >Registrase</button>
        <br>
        <div>
	        <input wire:click="default" class="btn btn-warning" value="Limpiar">
	        <input wire:click="close" class="btn btn-danger" value="Salir">
	    </div>








	</div>




</div>

<script src="{{ asset('js/validar.js') }}"></script>
