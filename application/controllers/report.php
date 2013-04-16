<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{
            header("Location: /");
	}
        
        
        public function status($cache)
        {
            $data = array();
            $data['hosts'] = $this->config->item('hosts');
            $data['cache'] = $cache;
            $this->load->view('header', $data);
            $this->load->view('menu', $data);                
            $this->load->view('report', $data);
            $this->load->view('footer');
        }
        
        public function info($cache, $check, $type)
        {
            $this->load->model('common');
            $data = array();
            if ($check == 'load') {
                if ($type == 'ext'){
                     $data['titulo'] = 'Load'; 
                }
               
                $data['value'] = $this->common->getsnmpvalue($cache,'.1.3.6.1.4.1.2021.10.1.3.1');
            }
            if ($check == 'memory') {
                if ($type == 'ext'){
                    $data['titulo'] = 'Memory';
                }
                $total = $this->common->getsnmpvalue($cache,'.1.3.6.1.4.1.2021.4.5.0');
                $free = $this->common->getsnmpvalue($cache,'.1.3.6.1.4.1.2021.4.6.0');
                $cached = $this->common->getsnmpvalue($cache,'.1.3.6.1.4.1.2021.4.15.0');
                $buffered = $this->common->getsnmpvalue($cache,'.1.3.6.1.4.1.2021.4.14.0');
                $used = $total - ($free + $buffered + $cached);
                $percent = ($used*100)/$total;
                $percent = number_format($percent, 0);
                $data['value'] = $percent . "%";
            }
            if ($check == 'cpu') {
                if ($type == 'ext'){
                    $data['titulo'] = 'CPU (User|System|Idle)';
                }
                $cpu_user = $this->common->getsnmpvalue($cache,'.1.3.6.1.4.1.2021.11.9.0');
                $cpu_system = $this->common->getsnmpvalue($cache,'.1.3.6.1.4.1.2021.11.10.0');
                $cpu_idle = $this->common->getsnmpvalue($cache,'.1.3.6.1.4.1.2021.11.11.0');
                $data['value'] = "$cpu_user" . "|" . "$cpu_system" . "|" . "$cpu_idle";
                
            }
            if ($check == 'http_status') {
                if ($type == 'ext'){
                    $data['titulo'] = 'HTTP Status';
                }
                $check_http = $this->common->check_http($cache);
                if ($check_http) {
                    $data['value'] = '<font color="green">OK</font>';
                } else {
                   $data['value'] = '<font color="red">KO</font>'; 
                }
            }
            $this->load->view('info', $data);
        }
        
        function table($table, $cache) 
        {
            $this->load->model('common');
            if ($table == 'top_status') {
                $data['titulo'] = "Top Status Code";
                $data['content'] = $this->common->query_agent($cache, "top_status");
            }
            if ($table == 'top_urls') {
                $data['titulo'] = "Top Urls";
                $data['content'] = $this->common->query_agent($cache, "top_urls");
            }
            if ($table == 'top_urls_back') {
                $data['titulo'] = "Top Urls Backend";
                $data['content'] = $this->common->query_agent($cache, "top_urls_back");
            }
            
            $this->load->view('tabla_report', $data);
            
            
        }
        
        function graph($type, $cache) {
            $data = array();
            $data['host'] = $cache;
            if ($type == 'hits') {
                $this->load->view('graph_hit', $data);
            }
            if ($type == 'request') {
                $this->load->view('graph_request', $data);
            } 
            if ($type == 'all_request') {
                $data['hosts'] = $this->config->item('hosts');
                $this->load->view('graph_all_request', $data);
            } 
            
        }
        
        function updategraph($type, $cache) {
            $this->load->model('common');
            $data = array();
            $data['host'] = $cache;
            if ($type == 'hits') {
                echo $this->common->getdataxsec($cache, 'hits');
            }
            
            if ($type == 'miss') {
                echo $this->common->getdataxsec($cache, 'miss');
            }
            if ($type == 'request') {
                echo $this->common->getdataxsec($cache, 'request');
            }            
            
        }        
        
}

