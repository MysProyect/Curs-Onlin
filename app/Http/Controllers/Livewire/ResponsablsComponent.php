<?php
namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Responsabls;
use Auth;
 
   
class ResponsablsComponent extends Component
{
	 use WithPagination;
	
	public $resp_id, $cedula, $name, $last_name, $email, $telef, $NroWp;
	public $view = 'create';
	public $searchResp = '';
	 
    public function render()
    {
		return view('livewire.responsabls-component', [
			'resps'=> Responsabls::where(function($sub_query)
			{
				$sub_query->where('name','like', '%'.$this->searchResp.'%')
				->orWhere('last_name','like', '%'.$this->searchResp.'%');
				})->orderBy('id','desc')->simplepaginate(10) 
		]);
     }
     
     public function store() {
		$this->validate(['cedula' => 'required']);
		 if ($this->email){
			  $this->validate([ 'email' => 'email']);  			 
			}	
		$resps = Responsabls::create([
		'cedula' => $this->cedula,
		'name' => $this->name,	
		'last_name' => $this->last_name,
		'email' => $this->email,
		'telef' => $this->telef,
		'NroWp' => $this->NroWp,
		'user_created' => Auth::user()->id
		]);  		 
			//vaciar los campos
			//$this->cedula = '';
			//$this->name= '';
			//$this->last_name= '';
		$this->default();
			return back()->with('mensaje','Datos Registrados');	
			
	}
     
     
     public function edit($id){
		$resp= Responsabls::find($id); 	
		$this->resp_id	= $resp-> id;
		$this->cedula = $resp->cedula;
		$this->name = $resp->name;
		$this->last_name = $resp->last_name;
		$this->email = $resp->email;
		$this->telef = $resp->telef;
		$this->NroWp = $resp->NroWp;
				
		$this->view = 'edit';		
	} 
	
	   public function update(){
		$this->validate(['cedula' => 'required']);
		$resp = Responsabls::find($this->resp_id); 	
		
		$resp->update([
			'cedula' => $this->cedula,
			'name' => $this->name,
			'last_name' => $this->last_name,
			'email' => $this->email,
			'telef' => $this->telef,
			'NroWp' => $this->NroWp,
			'user_updated' => Auth::user()->id
		]);
		$this->default(); 
		return back()->with('mensaje','Datos Actualizados');	
	}
	
     
	
   public function destroy ($id){
		Responsabls::destroy($id);  
	}
	
	
	
	public function default(){
		$this->cedula = '';
		$this->name = '';			
		$this->last_name = '';
		$this->email = '';
		$this->telef = '';
		$this->NroWp = '';
		$this->view = 'create';		
	}
	

    
}

//en view -> wire:model="search"

//public $search = 'Jerad Schmidt';

    //public function render()
    //{
        //return view('livewire.posts-page', [
            //'posts' => Post::where(
                //'title', 'LIKE', '%' . $this->search . '%'
            //)->orWhere(
                //'body', 'LIKE', '%' . request('search') . '%'
            //)->get()
        //]);
    //}
