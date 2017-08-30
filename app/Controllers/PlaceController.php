<?php

namespace App\Controllers;

use App\Models\Place;

class PlaceController{
	public function __construct(){
		$this->place = new Place();
	}
	public function index(){
		return redirect("place");
	}
	public function all(){
		$place = $this->place->all();
		return view('index',[
			'datas'=>$place
		]);
	}
}