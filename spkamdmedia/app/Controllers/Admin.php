<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
class Admin extends BaseController{
	public function index(){
		if(session()->get('admin')){
			return view('landing');
		}else{
			return view('login');	
		}
	}
}
?>