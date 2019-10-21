<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

    var $data = array();

    public function _construct()
    {
      parent::_construct();
    }


    public function index() {
        $config = array (
            'upload_path' => 'upload/',
            'allowed_types' => 'jpg|jpeg|png|bmp',
            'max_size' => 0,
            'filename' => url_title($this->input->post('file')),
            'encrypt_name' => true

        );

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')){
             $this->db->insert('tb_image', array(
                'file_name' =>  $this->upload->file_name
             ));
             $this->session->set_flashdata('msg', 'Success!!!');
             redirect(base_url());
        }

        $this->data = array(
          'get_image' => $this->db->get('tb_image')

        );

        $this->load->view('image', $this->data);
    }
     public function delete_image($ID){
        

     }
}
