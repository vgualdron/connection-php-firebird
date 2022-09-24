<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Implementations\MovementServiceImplement;

class MovementController extends Controller
{
	private $request;
    private $service;    

    public function __construct(Request $request, MovementServiceImplement $service){       
        $this->service = $service;
		$this->request = $request;
    }

    function generate($year){
        $data = $this->request->all();
        return response($this->service->generate($year, $data));
    }
}