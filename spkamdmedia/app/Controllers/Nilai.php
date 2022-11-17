<?php
namespace App\Controllers;
use App\Models\Nilaimodel;
use App\Models\Kriteriamodel;
use App\Models\Karyawanmodel;
class Nilai extends BaseController{
	
	public function index(){
		$mods = new Kriteriamodel();
		$modss = new Karyawanmodel();
		if(session()->get('admin')){
			$data['bulan'] = date('m');
			$data['tahun'] = date('Y');
			$data['kriteria'] = $mods->findAll();
			$data['data'] = $modss->findAll();
			return view('nilai',$data);
		}else{
			return view('login');	
		}
	}

	public function tampildata(){
		$mods = new Kriteriamodel();
		$modss = new Karyawanmodel();
		$data['bulan'] = $this->request->getPost('bulan');
		$data['tahun'] = $this->request->getPost('tahun');
		$data['kriteria'] = $mods->findAll();
		$data['data'] = $modss->findAll();
		return view('nilai',$data);
	}

	public function simpandata($x){
		$db = db_connect();
		$mod = new Nilaimodel();
		$nilai = $this->request->getPost('nilai');
		$idkaryawan = $this->request->getPost('idkaryawan');
		$periode = $this->request->getPost('periode');
		$cek = $db->query("select * from nilai where periode = '".$periode."' and idkriteria = '".$x."' and idkaryawan = '".$idkaryawan."'")->getResultArray();
		if(count($cek) > 0){
			$id = $db->query("select idnilai from nilai where periode = '".$periode."' and idkriteria = '".$x."' and idkaryawan = '".$idkaryawan."'")->getResultArray()[0]['idnilai'];
			$mod->updatedata($id,['nilai' => $nilai]);
		}else{
			$data = array(
				'nilai' => $nilai,
				'periode' => $periode,
				'idkriteria' => $x,
				'idkaryawan' => $idkaryawan
			);
			$mod->insert($data);
		}

		return redirect()->to(base_url('nilai'));
	}
}
?>