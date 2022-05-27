<?php defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_mahasiswa_m extends CI_Model
{
    public function getAllMhs()
    {
        return $this->db->get_where('tb_mahasiswa')->result_array();
    }

    public function getMhsByNim($nim)
    {
        return $this->db->get_where('tb_mahasiswa', ['nim' => $nim])->row_array();
    }

    
    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($table, $where, $data)
    {
        $this->db->where('nim', $where);
        $this->db->update($table, $data);
    }

    public function delete_data($nim)
    {
        $this->db->delete('tb_mahasiswa', ['nim' => $nim]);
    }
}
