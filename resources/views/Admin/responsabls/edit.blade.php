
	<img src="{{asset('images/icons/editar.png')}}" class="img-AddEdit"><br> 

	@include('Admin.responsabls.form')

	<button wire:click="update" class="btn btn-success"> Actualizar</button>

	<button wire:click="default" class="btn btn-danger"> Cancelar </button>
