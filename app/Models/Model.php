<?php

namespace App\Models;

use Kernel\Database;

class Model extends Database{
	protected $table = '';
	protected $primaryKey = 'id';
	protected $sql = '';

	public function map($array){
		$arr = [];
		while($query = $array->fetch_assoc()){
			$arr[] = $query;
		}
		return $arr;
	}
	public function all(){
		$this->sql = 'SELECT * FROM '. $this->table;
		$query = $this->query($this->sql);
		return $this->map($query);
	}
}