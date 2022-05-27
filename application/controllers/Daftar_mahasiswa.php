<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('daftar_mahasiswa_m');
        
    }

    public function index()
    {
        $data['tb_mahasiswa'] = $this->daftar_mahasiswa_m->getAllMhs();
        
        // memanggil halaman view
        $this->load->view("mahasiswa_v", $data);
    }
    public function insert()
    {
        $this->load->view('tambah_mhs');
    }
    public function tambah()
    {
        $nim = $this->input->post('nim');
            $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $data = [
                
                'nim' => $nim,
                'nama_mahasiswa' => $nama_mahasiswa
            ];
            $uploadgambar = $_FILES['foto_ktp']['name'];
            if ($uploadgambar) {
                # code...
                $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
                $config['max_size'] = 3024;
                $config['file_name'] = uniqid();
                $config['overwrite'] = true;
                $config['upload_path'] = './upload/foto/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_ktp')) {
                    # code...
                    $img = $this->upload->data('file_name');
                    $this->db->set('foto_ktp', $img);
                } else {
                    redirect('daftar_mahasiswa');
                }
            } else {
                $data['foto_ktp'] = 'ktp.jpg';
            }

            $uploadgambar2 = $_FILES['foto_diri']['name'];
            if ($uploadgambar2) {
                # code...
                $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
                $config['max_size'] = 3024;
                $config['file_name'] = uniqid();
                $config['overwrite'] = true;
                $config['upload_path'] = './upload/foto/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto__diri')) {
                    # code...
                    $img = $this->upload->data('file_name');
                    $this->db->set('foto_diri', $img);
                } else {
                    redirect('daftar_mahasiswa');
                }
            } else {
                $data['foto_diri'] = 'default.jpg';
            }

            $this->daftar_mahasiswa_m->tambah_data('tb_mahasiswa', $data);

            redirect('daftar_mahasiswa');
        
    }

    public function edit($nim)
    {
        $data['tb_mahasiswa'] = $this->daftar_mahasiswa_m->getMhsByNim($nim);
       
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
            $data1 = [
                'nim' => $nim,
                'nama_mahasiswa' => $nama_mahasiswa
                
            ];
            $uploadgambar = $_FILES['foto_ktp']['name'];
            if ($uploadgambar) {
                # code...
                $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
                $config['max_size'] = 3024;
                $config['file_name'] = uniqid();
                $config['overwrite'] = true;
                $config['upload_path'] = './upload/foto/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_ktp')) {
                    # code...
                    $ktp_lama = $data['tb_mahasiswa']['foto_ktp'];
                    if ($ktp_lama != 'ktp.jpg') {
                        # code...
                        unlink(FCPATH . 'upload/foto/' . $ktp_lama);
                    }

                    $img = $this->upload->data('file_name');
                    $this->db->set('foto_ktp', $img);
                } else {
                    redirect('daftar_mahasiswa');
                }
            }

            $uploadgambar2 = $_FILES['foto_diri']['name'];
            if ($uploadgambar2) {
                # code...
                $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
                $config['max_size'] = 3024;
                $config['file_name'] = uniqid();
                $config['overwrite'] = true;
                $config['upload_path'] = './upload/foto/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_diri')) {
                    # code...
                    $foto_lama = $data['tb_mahasiswa']['foto_diri'];
                    if ($foto_lama != 'foto.jpg') {
                        # code...
                        unlink(FCPATH . 'upload/foto/' . $foto_lama);
                    }

                    $img = $this->upload->data('file_name');
                    $this->db->set('foto_diri', $img);
                } else {
                    redirect('daftar_mahasiswa');
                }
            }
            $this->daftar_mahasiswa_m->edit_data('tb_mhasiswa', $nim, $data1);

            redirect('daftar_mahasiswa');
        
    }

    public function hapus($nim)
    {
        $this->daftar_mahasiswa_m->delete_data($nim);
        redirect('daftar_mahasiswa');
    }
}
