<?php
namespace App\Controllers;
use App\Models\KriteriaModel;
use App\Models\KaryawanModel;
class Analisa extends BaseController{
	
	public function index(){
		if(session()->get('admin')){
			$mod = new KriteriaModel();
			$mods = new KaryawanModel();
			$data['kriteria'] = $mod->findAll();
			$data['data'] = $mods->findAll();
			$data['bulan'] = date('m');
			$data['tahun'] = date('Y');
			return view('analisa',$data);
		}else{
			return view('login');	
		}
	}

	public function tampildata(){
		$mod = new KriteriaModel();
		$mods = new KaryawanModel();
		$data['kriteria'] = $mod->findAll();
		$data['data'] = $mods->findAll();
		$data['bulan'] = $this->request->getPost('bulan');
		$data['tahun'] = $this->request->getPost('tahun');
		return view('analisa',$data);
	}

	public function simpandata(){
		return redirect()->to(base_url('analisa'));
	}
}
?>