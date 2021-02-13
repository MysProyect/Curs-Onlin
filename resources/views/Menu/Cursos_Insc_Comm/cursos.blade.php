<!-- VIEW CURSOS INSC & COMMENT-->

<div>
       
  <div style="display: flex;" align="center" >
      <div class="title" style=" padding-left: 10%;" >
        <b>Cursos </b>
      </div>
      <div align="center" style="margin-left: 30%;">
        <label class="display-7 text-muted"><i>Esta hoja que se abre lleva impresa tu nombre y el mío, con la
          intención podamos surcar sin líneas no delineadas pero si contenidas... Hazlo tuyo,
          y siéntelo con la fuerza que brinda el camino para que le transites sin
          temor alguno.</i>
        </label>
      </div>
  </div> 


  @if (session('mensaje'))
    <div class="alert alert-success">             
        <label>{{ session('mensaje') }} <small class="text-danger">recibira confirmacion por email en las proximas 48hrs, mientras se valida su registro</small> </label>
    </div>
  @endif 


@foreach( $cursos as $curso)
<div class="listCurs" > 
  		<p class="display-5 text-primary text-center text-uppercase" >{{ $curso->title}}</p>				   
	  <div style="display:flex;">
      <div align="center">
        <img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs"/>       
      </div>  
			<div  style="padding:2%; width: 60%; text-align: center;">	
		      <!--  	 <?php $tam = strlen($curso->description); ?> -->
          <!-- <?php echo substr($curso->description, 0, 200); ?> -->		             
				<small class="text-muted"> 
            @if($curso->description)
              {{$curso->description}}... 
            @else
               Descripcion No disponible
            @endif
        </small><br> 
        @if($curso->duracion)
          <small class="display-5"><b><i>duration: {{$curso->duracion}}</i></b></small>
        @endif  
             <button wire:click="insc({{ $curso->id }})" class="btn btn-success">Participar | inscribirse</button>
      </div>

    </div>
      <div style="margin-left: 3%;">        
        @if (session('comment'))
          <div class="alert alert-success">             
            <!-- <label>
              <img src="{{asset('images/icons/new-comment.png')}}"><b>{{ session('comment') }}  </b> <img src="{{asset('images/icons/act.png')}}" ><i>actualiza la pagina para ver comentario</i>
            </label> -->
            <small>
              <b>{{ session('comment') }}</b> 
            </small>
          </div>
      @endif
      @if ($viewcomment == 3)
        @include('Menu.Cursos_Insc_Comm.comments')
      @endif
    <button wire:click="comment({{ $curso->id }})" class="btn btn-primary">Comentar</button> 
    <div>
         <!--VER COMMENTS-->
          <details>
            <summary><img src="{{asset('images/icons/comments.png')}}"> See all Comments</summary>            
            <?php $Nro = Count($curso->comments); ?>
            @if ($Nro>0)
                  <!--  <label> <i><b>{{$Nro}} comentarios</b></i></label><br> -->
              @foreach($comments as $comm)
                @if($curso->id == $comm->curso_id)                                        
                  <div class="media-body">
                    <h4 class="media-heading">
                      <img src="{{asset('images/icons/comment.png')}}" width="80">
                      <a href="#fakelink">{{$comm->name}}</a> 
                      <small>
                        @if($comm->created_at)
                          {{ date_format($comm->created_at, 'j M Y') }}
                        @endif
                      </small>
                    </h4>
                     <p>{{$comm->comment}}</p>
                  </div>
                @endif                  
              @endforeach             
              <?php echo $comment=''; ?> 
            @else
             <small class="">sin comentarios...</small>
            @endif        
          </details>       
        </div>
      </div>
@endforeach
     <label>{{ $cursos->links()}}</label> 	
</div>
</div>
                         