<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Aula;
use App\Curso;
use App\Participant;
use App\Incription;
use App\AulaVisita;
class MenuAula extends Component
{


	public $continuar='', $reg='', $acceder='', $aula='', $curso_id='',$part_id='', $view='';
	public $cedula, $name, $last_name, $Notpart;
	public $usuario, $password, $password_confirmation, $email;

	public $aulaExiste='', $inscExiste='';

	public $auth, $failAuth;



    public function render()
    {
    	$cursos = Curso::all();;
    	$aulas = Aula::all();
        return view('livewire.menu-aula', compact('aulas','cursos'));
        // return view('livewire.menu-aula', [
        // 	'aulas' =>Aula::orderBy('id','desc')->paginate(5) 
        // ]);
	}

	public function ir(){
		$this->continuar = true;
	}

	public function registro($id){
			$curso = Curso::find($id);		
			$this->reg = true;
			$this->acceder = '';
			$this->curso = $curso;
			$this->curso_id = $curso->id;
	}
	

	public function verif(){ 
		$this->validate(['curso_id'=>'required', 'cedula' => 'required']); 

		$part = Participant::where('cedula','=',$this->cedula)->first();
		
		   if ($part)  {
		   		$this->name = $part->name;
		   		$this->last_name = $part->last_name;
		   		$this->email = $part->email;
			    // return back()->with('mensaje','Datos Registrados');	
		   		$this->part_id = $part->id;
			}else{
				$this->reg = '';
				$this->curso_id = '';
				return back()->with('alert', 'Disculpe!, no esta inscrito en este curso');
				  //return back()->with('alert','Datos ya Registrados');
			} 
		$inscExiste = Incription::where('part_id',$part->id)->where('curso_id',$this->curso_id)->first();
		if($inscExiste){
			$this->inscExiste = $inscExiste;
		}else{
			$this->inscExiste=0;
		}

		$aulaExiste = Aula::where('part_id',$part->id)->where('curso_id',$this->curso_id)->first();
		if($aulaExiste){
			$this->aulaExiste=$aulaExiste;
		}else{
			$this->aulaExiste=0;
		}
				
	}



	public function saveregistro(){

		$this->validate([
        'usuario' => 'required|min:5|max:10|unique:aulas',
        'password' => 'required|min:5|max:10|confirmed',
        ]);

  		// $AuthAula = Aula::create([
		// 'part_id' => $part->id,
		// 'curso_id' => $this->curso_id,	
		// 'usuario' => $this->usuario,
		// 'password' => $this->password	
		// ]);
		$NewAula = new Aula;
        $NewAula->part_id = $this->part_id;
        $NewAula->curso_id = $this->curso_id;
        $NewAula->email = $this->email;
        $NewAula->usuario = $this->usuario;
        $NewAula->password = bcrypt($this->password);
		$NewAula->save();
		if($NewAula){
			$ultim = Aula::find($NewAula->id);	
			$visita = AulaVisita::create([
				'aula_id' => $ultim->id
			]);
		}
		$this->auth = $auth->id;
		$this->aulaExiste='';
		$this->reg='';
		$this->acceder='';
		$this->ir='';
		$this->aula='BIENVENIDO';
		return back()->with('mensaje','Datos Registrados');
    
	}

	public function InicSeccion($id){
		$curso = Curso::find($id);		
		$this->aulaExiste='';
		$this->reg='';
		$this->acceder = true;
		$this->curso = $curso;
		$this->usuario = $this->usuario;
		$this->password = $this->password;
		// $this->curso_id = $curso->id;
	

	}
	public function Acceder(){	
		$login = $this->usuario;
		$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'usuario';

		// if($data == 'usuario'){
		// 	$this->data = $data;
		// }
		

		
		$auth = Aula::where('usuario',$this->usuario)
			->orWhere('email',$this->usuario)
			->where('password',$this->password)->first();
		if($auth){
			$visita = AulaVisita::create([
				'aula_id' => $auth->id
			]);

			$this->auth = $auth;
			$this->aula = true;
		}else{

			$this->failAuth='Fallo Autenticación, verifique';
		}
		
		//return [ $field => $login,	'password' => $this->password	];


	
		
	}





	public function default(){
		$this->email = '';
		$this->usuario = '';
		$this->password = '';	
	}

















}