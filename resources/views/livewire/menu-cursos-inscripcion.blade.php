<div class="tool-liv">
    <div style="margin-right:3%;" class="">
    	@if ($viewinsc == 0)
			@include("Menu.Cursos_Insc_Comm.cursos")
		@elseif($viewinsc == 1)
			@include("Menu.Cursos_Insc_Comm.inscribirse")
			
		@endif
		
	</div>

			
</div>
