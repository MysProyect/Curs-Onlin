<img src="{{asset('images/editar.png')}}" class="img-AddNew"> 

@include('participants.form')

<button wire:click="update" class="btn btn-warning"> Actualizar</button>

<button wire:click="default" class="btn btn-danger"> Cancelar </button>
