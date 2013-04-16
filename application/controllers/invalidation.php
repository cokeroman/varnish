<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invalidation extends CI_Controller {

	public function index()
	{
            $data = array();
            $data['hosts'] = $this->config->item('hosts');
            
            $this->load->view('header');
            $this->load->view('menu', $data);                
            $this->load->view('invalidation', $data);
            $this->load->view('footer');
	}
        
        public function url()
        {
            $this->load->model('common');
            $data = array();
            $data['hosts'] = $this->config->item('hosts');      
            $data['domain'] = $this->input->post('domain');
            $data['uri'] = $this->input->post('uri');
            foreach ($data['hosts'] as $host) {
                $data['status'][$host] = $this->common->invalidate($data['domain'],$data['uri'], $host);
            }
            
            $this->load->view('header');
            $this->load->view('menu', $data);                
            $this->load->view('invalidation', $data);
            $this->load->view('footer');
            
            
            
        }
        
        
}

