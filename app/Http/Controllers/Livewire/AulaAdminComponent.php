<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Clase;
use App\Curso;
use App\ClassSeccion;
use Auth;


use Illuminate\Support\Str;
use Illuminate\Support\Atr;

class AulaAdminComponent extends Component
{
	use WithFileUploads;

	public $create='', $edit='', $cursos, $curso, $curso_id, $title, $seccion;
	public $files=[], $url, $texto;
	public $fields, $Secc_class, $edit_sect;


	public $mensaj='', $exist, $clickimage, $clickvideo, $imgExt, $image, $busc, $upload;




    public function render()
    {
        return view('livewire.aula-admin-component');
    }

    public function mount(){
    	$cursos = Curso::all();
    	$this->cursos = $cursos;
    	$this->fields = 1;
    }

	public function verif(){
			$this->validate([
            'curso_id' => 'required'
        ]);
		$busc = '';
		if($this->curso_id){
			$this->create='';
			$busc = ClassSeccion::where('class_id','=',$this->curso_id)
			->where('seccion','=',$this->seccion)->first();

			if($busc){
				$this->create = '';
				$this->edit = '';
				$this->mensaj = true;

			}else{
				$curso = Curso::find($this->curso_id);
			 	$this->title = $curso->title;
			 	$this->seccion = $this->seccion;
				$this->create = true;
				$this->mensaj = '';
				$this->edit = '';
			}
		}	
	}


	public function edit(){
		$this->edit = true;
		$this->mensaj = '';
		$this->create='';


		$curso = Curso::find($this->curso_id);
		$this->curso = $curso;
		$class = Clase::where('curso_id','=',$this->curso_id)->first();
		

		$this->edit_sect = ClassSeccion::where('class_id','=',$class->id)->where('seccion','=',$this->seccion)->get();





	}















	public function dejar(){
			$this->create='';
			$this->mensaj = '';
			$this->edit = '';
	}



	public function AddField(){
		$this->fields = $this->fields+1;
	}



	public function upload_save(){
			$this->validate([
            'seccion' => 'required',
            'files'=>  'max:4096'
        ]);
		$class = Clase::where('curso_id','=',$this->curso_id)->first();
		if(!$class){
  	 		$class = Clase::create([
			'curso_id' => $this->curso_id,
	 		'user_created' => Auth::user()->id
		 	]);
		}
	 	foreach ($this->files as $file) {
	         	$upload = $file->store('Files');
	          	$Secc_class = ClassSeccion::create([
	 		  	'class_id' => $class->id,
	 			'seccion' => $this->seccion,
	 			'file' => $upload,
	 			'url' => $this->url,
	 			'texto' => $this->texto,
	 			'user_created' => Auth::user()->id
	 		]);
	    }
		
		if($Secc_class){
	   		$this->create='';
			$this->mensaj = '';
			$this->edit = '';
	   		return back()->with('mensaje','Registro Guardado');
       	}else{
       		return back()->with('error','datos no registrados');
       	}
       	


       	// $Extimg = Str::endsWith($upload,'.png');
        	// $Extvideo = Str::endsWith($upload,['.mp4','MP4','mpeg-4','.MPEG-4','gif','GIF','ico']);
        	// $Extdoc = Str::endsWith($upload,['.doc','.docx','pptx','.pdf','.txt','.xml','.opt','.zip','rar']);
			// if($Extimg){
			// 	$Secc_class->image = $upload;
			// 	$Secc_class->save();
			// }

			// if($Extvideo){
			// 	$Secc_class->video = $upload;
			// 	$Secc_class->save();
			// }
			// if($Extdoc){
			// 	$Secc_class->doc = $upload;
			// 	$Secc_class->save();
			// }

     
         
  
	}




}
