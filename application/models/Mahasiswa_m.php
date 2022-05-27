<?php
class Mahasiswa_m extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_mahasiswa')->result_array();
    }

    public function tambah_mahasiswa($table, $data)
    {
        $this->db->insert($table, $data);
    }
	public function edit_mahasiswa($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

	public function update_mahasiswa($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update('tb_mahasiswa', $data);
    }
	public function hapus_mahasiswa($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getMhs($nim)
    {
        return $this->db->get_where('tb_mahasiswa', ['nim' => $nim])->row_array();
    }

//     function update()
//     {
//         if (!empty($_FILES["foto_ktp"]["name"])) {
// 			$data = [
// 				"nim" => $this->input->post('nim', true),
// 				"nama_mahasiswa" => $this->input->post('nama_mahasiswa', true),
// 				"foto_ktp" => $this->uploadGambar('foto_ktp', true),
// 				"foto_diri" => $this->uploadGambar2('foto_diri', true)

// 			];
// 		} else {
// 			$data = [

// 				"nim" => $this->input->post('nim', true),
// 				"nama_mahasiswa" => $this->input->post('nama_mahasiswa', true),
// 				"foto_ktp" => $this->input->post('ktp_lama', true),
// 				"foto_diri" => $this->input->post('foto_lama', true)
// 			];
// 		}

// 		if (!empty($_FILES["foto_diri"]["name"])) {
// 			$data = [
// 				"nim" => $this->input->post('nim', true),
// 				"nama_mahasiswa" => $this->input->post('nama_mahasiswa', true),
// 				"foto_ktp" => $this->uploadGambar('foto_ktp', true),
// 				"foto_diri" => $this->uploadGambar2('foto_diri', true)

// 			];
// 		} else {
// 			$data = [

// 				"nim" => $this->input->post('nim', true),
// 				"nama_mahasiswa" => $this->input->post('nama_mahasiswa', true),
// 				"foto_ktp" => $this->input->post('ktp_lama', true),
// 				"foto_diri" => $this->input->post('foto_lama', true)
// 			];
// 		}

// 		$this->db->where('nim', $this->input->post('nim'));
// 		$this->db->update('tb_mahasiswa', $data);
//     }

// 	public function getMhs($nim)
//     {
//         return $this->db->get_where('tb_mahasiswa', ['nim' => $nim])->row_array();
//     }

//     function delete($where, $table)
//     {
//         $this->db->where($where);
//       $this->db->delete($table);
//     }

//     public function rules()
// 	{
// 		return [
// 			[
// 				'field' => 'nim', // <- diambil dari field artibut name
// 				'label' => 'NIM', // <- membuat alias dari name
// 				'rules' => 'required'
// 			], // <- validasi yang dibutuhkan

// 			[
// 				'field' => 'nama_mahasiswa',
// 				'label' => 'nama mahasiswa',
// 				'rules' => 'required'
// 			]

			
// 		];
// 	}

//     public function tambah()
// 	{
//         $data = [
// 			"nim" => $this->input->post('nim', true),
// 			"nama_mahasiswa" => $this->input->post('nama_mahasiswa', true),
// 			"foto_ktp" => $this->uploadGambar('foto_ktp', true),
// 			"foto_diri" => $this->uploadGambar2('foto_diri', true)
// 		];

// 		$this->db->insert('tb_mahasiswa', $data);
//     }

//     private function uploadGambar()
// 	{
// 		$config['upload_path']          = './upload/foto/';
// 		$config['allowed_types']        = 'gif|jpg|png|jpeg';
// 		$config['file_name']            = uniqid();
// 		$config['overwrite']			= true;
// 		$config['max_size']             = 3024; // 3MB
// 		// $config['max_width']            = 1024;
// 		// $config['max_height']           = 768;

// 		$this->load->library('upload', $config);
// 		if ($this->upload->do_upload('foto_ktp')) {
//             return $this->upload->data("file_name");
//         }print_r($this->upload->display_errors());
//         return "ktp.jpg";
		
// 	}



//     public function update_mahasiswa($table, $where, $data)
//     {
//         $this->db->where('nim', $where);
//         $this->db->update($table, $data);
//     }

// private function uploadGambar2()
// 	{
// 		$config['upload_path']          = './upload/foto/';
// 		$config['allowed_types']        = 'gif|jpg|png|jpeg';
// 		$config['file_name']            = uniqid();
// 		$config['overwrite']			= true;
// 		$config['max_size']             = 3024; // 3MB
// 		// $config['max_width']            = 1024;
// 		// $config['max_height']           = 768;

// 		$this->load->library('upload', $config);

// 		if ($this->upload->do_upload('foto_diri')) {
//             return $this->upload->data("file_name");
//         }print_r($this->upload->display_errors());
//         return "default.jpg";
// 	}

// 	function multiple_upload(){
// 		$config['upload_path']   = './upload/foto/'; 
// 		//$config['allowed_types'] = 'gif|jpg|png'; 
// 		//$config['max_size']      = 100; 
// 		//$config['max_width']     = 1024; 
// 		//$config['max_height']    = 768;  
// 		$this->load->library('upload', $config);
// 		// script upload file pertama
// 		$this->upload->do_upload('foto_ktp');
// 		$foto_ktp = $this->upload->data();
// 		echo "<pre>";
// 		// print_r($foto_ktp);
// 		// echo "</pre>";
		
// 		// script uplaod file kedua
// 		$this->upload->do_upload('foto_diri');
// 		$foto_diri = $this->upload->data();
// 		echo "<pre>";
// 		// print_r($foto_diri);
// 		// echo "</pre>";
//    }
}       