<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Curso;
use App\Participant;
use App\Incription;
use App\UserAula;
use App\UserVisitAula;
class MenuAula extends Component
{

	public $iniciar=true, $cursos, $curso, $part;
	public $continue, $valid, $logeat, $regist, $verif; //view
	public $curso_id, $decid; //si curso_id decid si esta o no registrado 
	public $usuario, $password, $password_confirmation, $email; //view regist
	public $insc; //view insc inscrito
	public $UserAula; 
	public $cedula; //view verif
	public $part_id; //view insc
	public $auth, $failAuth; //auhtenticacion
	public $aula; //view aula bienvenido
	public function mount(){
		$cursos = Curso::all();
		$this->cursos = $cursos;
	}






    public function render()
    {
        return view('livewire.menu-aula');
        // return view('livewire.menu-aula', [
        // 	'aulas' =>Aula::orderBy('id','desc')->paginate(5) 
        // ]);
	}

	public function continue(){
		$this->continue = true;
	}

	public function decid(){
		$curso = Curso::find($this->curso_id);
		$this->curso_id = $this->curso_id;
		$this->decid = true; //pregunta si esta loguado  o no
	}



	public function regist($id){
		$curso = Curso::find($this->curso_id);
		$this->curso_id = $this->curso_id;	
		$this->logeat = '';	
		$this->verif = true;
		
	}








	public function verif($id){ 
		$this->validate(['cedula' => 'required']); 
		$part = Participant::where('cedula','=',$this->cedula)->first();
		if ($part)  {
			$this->part = $part;	
			$this->part_id = $part->id;
		}else{
			$this->regist = '';
			$this->continue = '';
			return back()->with('alert', 'Disculpe!, no esta registrado');
			 		  //return back()->with('alert','Datos ya Registrados');
		} 
		$insc = Incription::where('part_id',$part->id)->where('curso_id',$this->curso_id)->where('conf', 1)->first();
		if($insc){
		  	
		  	$UserAula = UserAula::where('part_id',$part->id)->where('curso_id',$this->curso_id)->first();
		  	if ($UserAula){
		  		$this->UserAula = true;
		  		$this->insc = true;		
		  	}else{ //registrarse llama a view
		  		$this->regist = true;
		  	}
		  	
		}else{
		  	
			return back()->with('alert', 'disculpe no esta inscrito en el curso, o debe esperar sea  "validada" su inscripcion');
		}

	}
	
	






















	public function saveregistro(){

		$this->validate([
        'usuario' => 'required|min:5|max:10|unique:user_aulas',
        'password' => 'required|min:5|max:10|confirmed',
        ]);

  		// $AuthAula = UserAula::create([
		// 'part_id' => $part->id,
		// 'curso_id' => $this->curso_id,	
		// 'usuario' => $this->usuario,
		// 'password' => $this->password	
		// ]);
		$NewAula = new UserAula;
        $NewAula->part_id = $this->part_id;
        $NewAula->curso_id = $this->curso_id;
        $NewAula->email = $this->email;
        $NewAula->usuario = $this->usuario;
        $NewAula->password = bcrypt($this->password);
		$NewAula->save();
		if($NewAula){
			$visita = UserVisitAula::create([
				'user_aula_id' => $NewAula->id

			]);

			$this->aula = true;
			$this->default();
		}else{

		}
		// $this->auth = $auth->id;
		// $this->aulaExiste='';
		// $this->reg='';
		// $this->acceder='';
		// $this->ir='';
		
		//return back()->with('mensaje','Datos Registrados');
    

    
	}




	public function logeat($id){
		$curso = Curso::find($this->curso_id);	
		$this->verif = '';	
		$this->regist = '';
		$this->cedula = '';
		$this->logeat = true;
		$this->curso = $curso;

		
		// $this->curso_id = $curso->id;
	

	}




	public function Acceder(){	
		$login = $this->usuario;
		$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'usuario';		
		$auth = UserAula::where('usuario',$this->usuario)
			->orWhere('email',$this->usuario)
			->where('password',$this->password)->first();
		if($auth){
			$visita = UserVisitAula::create([
				'aula_id' => $auth->id
				
				// 'visita' => funcion datatime laravel
			]);

			$this->auth = $auth;
			$this->iniciar = false;
			$this->continue = '';
			$this->valis = '';
			$this->regist = '';
			$this->logeat = '';
			$this->aula = true;
		}else{

			$this->failAuth='Fallo Autenticación, verifique';
		}
		
		//return [ $field => $login,	'password' => $this->password	];
		//$this->default();

	
		
	}


































	public function default(){
		$this->iniciar = false;
		$this->continue = '';
		$this->valis = '';
		$this->regist = '';
		$this->logeat = '';
		$this->verif = '';
		$this->usuario = '';
		$this->password = '';	
	}

		public function clear(){
		$this->email = '';
		$this->usuario = '';
		$this->password = '';	
	}














}