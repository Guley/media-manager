<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
	
    public function get($table_name, $where = [], $offset = 0, $is_single = false, $is_total = false){
        $this->db->from($table_name);
        
        if(!empty($where)){
            
            if(isset($where['search_query'])){
                foreach($where['search_query'] as $squery){
                    $this->db->where($squery);
                }
                unset($where['search_query']);
            }
            
            $this->db->where($where);
        }
        
        if(!$is_total){
            if($is_single){
                    return $this->db->get()->row_array();
            } else {
                if($offset >= 0){
                    $this->db->limit(PAGE_RECORD_LIMIT, $offset);
                }
                return $this->db->get()->result_array();
            }
        } else {
            return $this->db->count_all_results();
        }

    }
    
    public function save($table_name, $data, $where = []){
        if(empty($where)){
            $this->db->insert($table_name, $data);
            return $this->db->insert_id();
        } else {
            $this->db->where($where);
            return $this->db->update($table_name, $data);
            //return $this->db->affected_rows();
        }
    }
}