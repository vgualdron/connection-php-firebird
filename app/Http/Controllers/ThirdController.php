<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Implementations\ThirdServiceImplement;

class ThirdController extends Controller
{
	private $request;
    private $service;    

    public function __construct(Request $request, ThirdServiceImplement $service){       
        $this->service = $service;
		$this->request = $request;
    }

    function list($year){  
        return response($this->service->list($year));
    }
	
	function listByType($type, $year){
        return response($this->service->listByType($type, $year));
    }
}