<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Clase;
use App\Curso;
use App\ClassSeccion;
use Auth;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Atr;
use App\Http\Controllers\Livewire\Storage;

class ClassAdminComp extends Component
{
	use WithFileUploads;

	public $class_select = true, $create, $edit,  $cursos, $curso, $curso_id, $title, $seccion;
	public $files=[], $url, $texto;
	public $fields, $Secc_class, $secc, $NroCS;
	public $mensaj, $list, $exist, $image, $busc, $upload, $delet;

	public $class, $clases, $name, $file, $clasSec;




    public function render()
    {
        return view('livewire.class-admin-comp');
    }

    public function mount(){
    	$cursos = Curso::all();
    	$this->cursos = $cursos;
    	$this->fields = 1;
    }

	public function verif(){
		$this->validate([ 'curso_id' => 'required' ]);
		if($this->curso_id){
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

	public function change_curso(){
		$this->create = '';
		$this->seccion = '';

	}


	public function edit(){
		$this->edit = true;
		$this->mensaj = '';
		$this->class_select ='';
		$curso = Curso::find($this->curso_id);
		$this->curso = $curso;
		$class = Clase::where('curso_id','=',$this->curso_id)->first();
		$secc = ClassSeccion::where('class_id','=',$class->id)->where('seccion','=',$this->seccion)->get();
		$this->secc = $secc;
		
	}



       	// $Extimg = Str::endsWith($file,'.png');
        	//seccMP4 = Str::endsWith($upload,['.mp4','MP4','mpeg-4','.MPEG-4','gif','GIF','ico']);
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














	public function list(){
		$this->class_select = '';
		$this->edit = '';
		$this->create = '';
		$clases = Clase::all();
    	$this->clases = $clases;
    	$clasSec = ClassSeccion::all();
    	$this->clasSec = $clasSec;
    	$this->list = 1;
  //   	$posts = ClassSeccion::withCount(['comments'])->get();
		// $this->posts=$posts;
	}







public function back(){

	$this->class_select = true;
	$this->seccion ='';
	$this->curso_id = '';
	$this->edit = '';
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
	$this->validate([  'files'=>  'max:4096'   ]);
	$class = Clase::where('curso_id','=',$this->curso_id)->first();
	if(empty($class)){
	   	$class = Clase::create([
			'curso_id' => $this->curso_id,
			'user_created' => Auth::user()->id
			 ]);
	}
	if($this->files){
		foreach ($this->files as $file) {
			$imgName = $file->getClientOriginalName();
			//$this->name = $imgName;
			$upload = $file->store('Files');
			$Secc_class = ClassSeccion::create([
				'class_id' => $class->id,
				'seccion' => $this->seccion,
				'file' => $upload,
				'name_file' => $imgName,
				'url' => $this->url,
				'texto' => $this->texto,
				'user_created' => Auth::user()->id
				]);
		}
	}	
	if($Secc_class){
		$this->default();
		   	return back()->with('mensaje','Registro Guardado');
	}else{
	    $this->default();
	    return back()->with('error','datos no registrados');
	}



				 // $file = $this->file;
			  //   // $imgExt = $this->file->getClientOriginalExtension();
			  //   $imgName = $file->getClientOriginalName();
			 //    $this->name = $imgName;
    }


public function delet($id){
	// ClassSeccion::delete(file_path);
	$file_db = ClassSeccion::find($id);
	$delet = $file_db->delete();

	return back();



	//Storage::delete($file_db->file);
	//return store::disk('public')->delete('URL'.$file_db->file);
}

public function clear(){
	$this->url='';
	$this->texto='';
}

public function default(){
	$this->create = '';
	$this->mensaj = '';
	$this->edit = '';
	$this->curso_id;
	$this->seccion = '';
	$this->class_select = true;
}








}