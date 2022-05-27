<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_m', 'm_mahasiswa');
    }
    public function index()
    {
        $data['tb_mahasiswa'] = $this->m_mahasiswa->tampil_data();
        $this->load->view('mahasiswa_v', $data);
    }
    public function tambah_mahasiswa()
    {  
        $this->load->view('tambah_mhs');
    }

    public function edit_mahasiswa($nim)
    {  
        $data['tb_mahasiswa'] = $this->m_mahasiswa->getMhs($nim);
        $this->load->view('mhs_edit', $data);
    }

    public function aksitambah_mahasiswa()
    {
        $nim = $this->input->post('nim');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $foto_ktp = $_FILES['foto_ktp'];
        $foto_diri = $_FILES['foto_diri'];

        if ($foto_ktp = '') {
        } else {
            $config['upload_path']          = './upload/foto';
            $config['allowed_types']        = 'jpg|png|jpeg|gif|JPG|JPEG|pdf';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_ktp')) {
                $foto_ktp = $this->upload->data('file_name');
            } else {
                $foto_ktp = $this->upload->data('file_name');
            }
        }

        if ($foto_diri = '') {
        } else {
            $config['upload_path']          = './upload/foto';
            $config['allowed_types']        = 'jpg|png|jpeg|gif|JPG|JPEG|pdf';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_diri')) {
                $foto_diri = $this->upload->data('file_name');
            } else {
                $foto_diri = $this->upload->data('file_name');
            }
        }



        $data = [
            'nim' => $nim,
            'nama_mahasiswa' => $nama_mahasiswa,
            'foto_ktp' => $foto_ktp,
            'foto_diri' => $foto_diri
        ];

        $this->m_mahasiswa->tambah_mahasiswa('tb_mahasiswa', $data);
        redirect('mahasiswa');
    }

   

    public function update_mahasiswa()
    {
        $nim = $this->input->post('nim');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $where = array('nim' => $nim);
        $foto_ktp = $_FILES['foto_ktp'];
        $foto_diri = $_FILES['foto_diri'];
        $foto= $this->db->get_where('tb_mahasiswa', $where);

        if ($foto_ktp = '') {
        } else {
            $config['upload_path']          = './upload/foto';
            $config['allowed_types']        = 'jpg|png|jpeg|gif|JPG|JPEG|pdf';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_ktp')) {

            } else {
                $foto_ktp = $this->upload->data('file_name');

                if ($foto->num_rows() > 0) {
                    $pros = $foto->row();
                    $name = $pros->foto_ktp;

                    if (file_exists($lok = FCPATH . '/upload/foto/' . $name)) {
                        unlink($lok);
                    }
                }
                $foto_ktp = $this->upload->data('file_name');
            }
        }

        if ($foto_diri = '') {
        } else {
            $config['upload_path']          = './upload/foto';
            $config['allowed_types']        = 'jpg|png|jpeg|gif|JPG|JPEG|pdf';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_diri')) {
                //echo "Upload Gagal"; die();
            } else {
                $foto_diri = $this->upload->data('file_name');

                if ($foto->num_rows() > 0)
                 {
                    $pros = $foto->row();
                    $name = $pros->foto_diri;

                    if (file_exists($lok = FCPATH . '/upload/foto/' . $name))
                    {
                        unlink($lok);
                    }
                }
                $foto_diri = $this->upload->data('file_name');
            }
        }



            $data = array(
                'nim' => $nim,
                'nama_mahasiswa' => $nama_mahasiswa,
                
            );

            if ($foto_ktp != NULL) 
            {

                $data['foto_ktp'] = $foto_ktp;
            }

            if ($foto_diri != NULL) 
            {

                $data['foto_diri'] = $foto_diri;
            } 
            

            $this->m_mahasiswa->update_mahasiswa($where, 'tb_mahasiswa', $data);
            redirect('mahasiswa');
    }

    public function hapus_mahasiswa($nim)
    {
        $where = array('nim' => $nim);
        $foto_diri = $this->db->get_where('tb_mahasiswa', $where);
        $foto_ktp = $this->db->get_where('tb_mahasiswa', $where);
        $this->m_mahasiswa->hapus_mahasiswa($where, 'tb_mahasiswa');

        if ($foto_ktp->num_rows($where) > 0){
            $pros = $foto_ktp->row();
            $name =$pros->foto_ktp;

            if (file_exists($lok = FCPATH .'/upload/foto' . $name))
            {
                unlink($lok);
            }
                if($foto_diri->num_rows($where) > 0)
                {
                $pros = $foto_diri->row();
                $name = $pros->foto_diri;

                    if (file_exists($lok = FCPATH .'/upload/foto' . $name))
                    {
                    unlink($lok);
                    }
                }
                redirect('mahasiswa');
        }            

    }
}
    
        

       

            
               
          
    
    // public function insert()
    // {
    //     $this->load->view('tambah_mhs');
    // }

    // public function tambah()
    // {
    //     $nim = $this->input->post('nim');
    //     $nama_mahasiswa = $this->input->post('nama_mahasiswa');
    //     $foto_ktp = $_FILES['foto_ktp'];
    //     $foto_diri = $_FILES['foto_diri'];

    //     if ($foto_ktp = '') {
    //     } else {
    //         $config['upload_path']          = './upload/foto';
    //         $config['allowed_types']        = 'jpg|png|jpeg|gif|JPG|JPEG|pdf';

    //         $this->load->library('upload', $config);
    //         if (!$this->upload->do_upload('foto_ktp')) {
    //             $foto_KTP = $this->upload->data('file_name');
    //         } else {
    //             $foto_ktp = $this->upload->data('file_name');
    //         }
    //     }

    //     if ($foto_diri = '') {
    //     } else {
    //         $config['upload_path']          = './upload/foto';
    //         $config['allowed_types']        = 'jpg|png|jpeg|gif|JPG|JPEG|pdf';

    //         $this->load->library('upload', $config);
    //         if (!$this->upload->do_upload('foto_diri')) {
    //             $foto_diri = $this->upload->data('file_name');
    //         } else {
    //             $foto_diri = $this->upload->data('file_name');
    //         }
    //     }



    //     $data = array(
    //         'nim' => $nim,
    //         'nama_mahasiswa' => $nama_mahasiswa,
    //         'foto_ktp' => $foto_ktp,
    //         'foto_diri' => $foto_diri
    //     );

    //     $this->m_mahasiswa->tambah_data( 'tb_mahasiswa', $data);
    //     redirect('mahasiswa');
    //     // $tb_mahasiswa = $this->input->post('tb_mahasiswa');
    //     // $data['tb_mahasiswa'] = $this->m_mahasiswa->tampil_data();
       
    //     // $this->form_validation->set_rules($this->m_mahasiswa->rules());
    //     // if ($this->form_validation->run() == FALSE) {
           
    //     //     $this->load->view('tambah_mhs', $data);
    //     // } else {
    //     //     $this->m_mahasiswa->tambah();
    //     //     redirect('mahasiswa');
    //     // }
    // }

    // public function update()
    // {

    //     $nim = $this->input->post('nim');
    //     $nama_mahasiswa = $this->input->post('nama_mahasiswa');
    //     $where = array('nim' => $nim);
    //     $foto_ktp = $_FILES['foto_ktp'];
    //     $foto_diri = $_FILES['foto_diri'];
    //     $foto= $this->db->get_where('tb_mahasiswa', $where);

    //     if ($foto_ktp = '') {
    //     } else {
    //         $config['upload_path']          = './upload/foto';
    //         $config['allowed_types']        = 'jpg|png|jpeg|gif|JPG|JPEG|pdf';

    //         $this->load->library('upload', $config);
    //         if (!$this->upload->do_upload('foto_ktp')) {

    //         } else {
    //             $foto_ktp = $this->upload->data('file_name');

    //             if ($foto->num_rows() > 0) {
    //                 $pros = $foto->row();
    //                 $name = $pros->foto_ktp;

    //                 if (file_exists($lok = FCPATH . '/upload/foto/' . $name)) {
    //                     unlink($lok);
    //                 }
    //             }
    //             $foto_ktp = $this->upload->data('file_name');
    //         }
    //     }

    //     if ($foto_diri = '') {
    //     } else {
    //         $config['upload_path']          = './upload/foto';
    //         $config['allowed_types']        = 'jpg|png|jpeg|gif|JPG|JPEG|pdf';

    //         $this->load->library('upload', $config);
    //         if (!$this->upload->do_upload('foto_diri')) {
    //             //echo "Upload Gagal"; die();
    //         } else {
    //             $foto_diri = $this->upload->data('file_name');

    //             if ($foto->num_rows() > 0) {
    //                 $pros = $foto->row();
    //                 $name = $pros->foto_diri;

    //                 if (file_exists($lok = FCPATH . '/upload/foto/' . $name)) {
    //                     unlink($lok);
    //                 }
    //             }
    //             $foto_diri = $this->upload->data('file_name');
    //         }
    //     }



    //         $data = [
    //             'nim' => $nim,
    //             'nama_mahasiswa' => $nama_mahasiswa,
                
    //         ];

    //         if ($foto_ktp != NULL) {

    //             $data['foto_ktp'] = $foto_ktp;
    //         }

    //         if ($foto_diri != NULL) {

    //             $data['foto_diri'] = $foto_diri;
    //         } 
            

    //         $this->m_mahasiswa->update_mahasiswa($where, $data, 'tb_mahasiswa');
    //         redirect('mahasiswa/index');
    //     // $tb_mahasiswa = $this->input->post('tb_mahasiswa');
    //     // $data['tb_mahasiswa'] = $this->m_mahasiswa->tampil_data();
    //     // $data['mhs'] = $this->m_mahasiswa->getMhs($nim);

    //     // $this->form_validation->set_rules($this->m_mahasiswa->rules());
    //     // if ($this->form_validation->run() == FALSE) {
           
    //     //     $this->load->view('mhs_edit', $data);
    //     // } else {
    //     //     $this->m_mahasiswa->update();
    //     //     redirect('mahasiswa');
    //     // }
        
    // }

    // public function delete($nim)
    // {
    //     $this->m_mahasiswa->delete(['nim' => $nim], 'tb_mahasiswa');
    //     redirect('mahasiswa');
    // }
