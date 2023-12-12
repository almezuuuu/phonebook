<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Phonebook_services_model extends CI_Model
{
    public $ID;
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function save_method_from_model(){
        try{     
            if(
                empty($this->Fname) || 
                empty($this->Lname) || 
                empty($this->Cnum)){
                throw new Exception(MISSING_DETAILS, true);
            }   
            
            $data = array(
                'Fname' => $this->Fname,
                'Lname' => $this->Lname,
                'Cnum' => $this->Cnum,
                'Date_created' => date('Y-m-d H:i:s')
            );

            $this->db->trans_start();
                           
            $this->db->insert($this->Table->contacts,$data);

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);	
            }else{
                $this->db->trans_commit();
                return array('message'=>SAVED_SUCCESSFUL, 'has_error'=>false);
            }
        }
        catch(Exception$msg){
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function delete(){
        try{     
            
            $this->db->trans_start();
            $this->db->where('ID', $this->ID);  
            $this->db->delete($this->Table->contacts);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);	
            }else{
                $this->db->trans_commit();
                return array('message'=>DELETED_SUCCESSFUL, 'has_error'=>false);
            }
        }
        catch(Exception$msg){
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function update(){
        try{     
            if(empty($this->Fname) || empty($this->Lname)){
                throw new Exception(MISSING_DETAILS, true);
            }      

            $data = array(
                'Fname'         => $this->Fname,
                'Lname'         => $this->Lname,
                'Cnum'       => $this->Cnum
            );

            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            $this->db->update($this->Table->contacts,$data);
            
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);	
            }else{
                $this->db->trans_commit();
                return array('message'=>SAVED_SUCCESSFUL, 'has_error'=>false);
            }
        }
        catch(Exception$msg){
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function search(){
        try{   

            $this->db->select('*');
            $this->db->like('Fname', $this->Search_text);
            $this->db->or_like('Lname', $this->Search_text);
            $this->db->from($this->Table->contacts);

            $query = $this->db->get()->result(); 

            return $query;
        }
        catch(Exception$msg){
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}