<div class="container">
	@if($iniciar)
	<div style=" margin-top: 5%;" class="form-group" align="center" >
	    <div class="text-center" >
	      <small class="display-4"> Bienvenidos <br>al</small> <br><small class="display-3 text-primary">Aula Virtual</small>
	    </div>
        <div class="text-center display-5" style=" margin-top: 2%;">
	      <label class="text-danger">
	      	<i>Para continuar... esta seccion previamente debe estar inscripto en un de nuestros</label> 
	      	<small class="text-success ">cursos disponibles...</small></i>
	      
	    </div>

					<!-- <div>
						<img src="{{ asset('images/av2.jpeg')}}" class="img-left" title="entrar al Aula Virtual">
					</div> -->

		<div align="center" style=" margin-top: 5%;">
			<button wire:click="continue" class="btn btn-primary btn-lg">Continuar</button>
		</div>
		@if (session('mensaje'))
			<div class="alert alert-success" style="margin-top: 1%">             
				{{ session('mensaje') }}
			</div>
		@endif
		@if (session('alert'))
			<div class="alert alert-success" style="margin-top: 1%">             
				{{ session('alert') }}
			</div>
		@endif
	</div>
	@endif
	<div class="form-group" align="center">
		@if($continue)
			@include('Menu.Aulas.continue')
		@endif

		@if ($verif)
			@include('Menu.Aulas.verif')
		@endif

		@if($regist)
			@include('Menu.Aulas.regist')
		@endif

		@if($insc)
	 		@include('Menu.Aulas.insc')
   		@endif


		@if($logeat)
	 		@include('Menu.Aulas.logeat')
   		@endif
	</div>

		@if($aula)
	 		@include('Menu.Aulas.aula')
   		@endif

</div>

	

