<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends MY_Controller {
	public function index()
	{
		
		$data['page_icon'] = '<i class="icon-paint-format"></i>';
        $data['meta_title'] = 'Welcome';
        $data['template_file'] = 'welcome_message';
        $this->load_view($data);
	}
}
