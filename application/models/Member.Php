<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member extends CI_Model{
    function __construct() {
        $this->tableName = 'members';
        $this->primaryKey = 'id';
    }
    
    public function insert($data = array()){
        if(!array_key_exists("created_at",$data)){
            $data['created_at'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("updated_at",$data)){
            $data['updated_at'] = date("Y-m-d H:i:s");
        }
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
}