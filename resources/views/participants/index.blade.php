@extends('layouts.appLivewire')
@section('title','- Participants ')
@section('content')

<div class="title" ><b>Participant's</b></div> 
	    <div align="right">
			<a href="{{ route('AdmUser') }}"  ><img src="{{ asset('images/irAtras.jpg') }}" width="100" height="120"></a>
	     </div>
	
<div class="tool">
	
    <div>@livewire('participants-component')</div>
        
</div>     


@endsection