<?php defined('BASEPATH') OR exit('No direct script access allowed');
class members extends CI_Controller
{
    /*
https://www.pakainfo.com/image-upload-in-codeigniter/
    */
    function  __construct() {
        parent::__construct();
        $this->load->model('Member');
    }

    function add(){
        if($this->input->post('membersubmit')){
            
            //Check whether Member upload profile_img
            if(!empty($_FILES['profile_img']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['profile_img']['name'];
                
                //Load upload library and initialize here configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('profile_img')){
                    $uploadData = $this->upload->data();
                    $profile_img = $uploadData['file_name'];
                }else{
                    $profile_img = '';
                }
            }else{
                $profile_img = '';
            }
            
            //Prepare array of Member data
            $MemberData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'profile_img' => $profile_img
            );
            
            //Pass Member data to model
            $insertMemberData = $this->Member->insert($MemberData);
            
            //Storing insertion status message.
            if($insertMemberData){
                $this->session->set_flashdata('success_msg', 'Member data have been added successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        //Form for adding Member data
        $this->load->view('add');
    }
}