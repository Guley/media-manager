<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    protected $userSession;
    public function __construct(){
        parent::__construct();
    }

    protected function load_view($data, $layout_file = 'layout'){
        $this->load->view($layout_file, $data);
    }
    
    protected function init_pagination($base_url, $total_rows){
            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = $base_url;
            $config['page_query_string'] = true;
            $config['total_rows'] = $total_rows;
            $config['per_page'] = PAGE_RECORD_LIMIT;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] ='<li class="prev">';
            $config['prev_tag_close'] ='</li>';
            $config['next_link'] ='&raquo';
            $config['next_tag_open'] ='<li>';
            $config['next_tag_close'] ='</li>';
            $config['last_tag_open'] ='<li>';
            $config['last_tag_close'] ='</li>';
            $config['cur_tag_open'] ='<li class="active"><a href="#">';
            $config['cur_tag_close'] ='</a></li>';
            $config['num_tag_open'] ='<li>';
            $config['num_tag_close'] ='</li>';
            $this->pagination->initialize($config);
            return $config;
    }

    
    protected function getQueryString($excludeParams=[]){
        $getVals = $this->input->get();
        $string = [];
        foreach ($getVals as $keys => $vals){
            if($keys != 'per_page'){
                if(!in_array($keys, $excludeParams)){
                    $string[] = $keys.'='.$vals;
                }
            }
        }
        return empty($string)?'':'?'.  implode('&', $string);
    }

}