<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('Pdf');
		$this->load->view('view_file');
	}
	
	public function testrest()
	{
		/*$this->load->library('rest', array('server' => 'http://twitter.com/'));
		$user = $this->rest->get('users/show', array('screen_name' => 'philsturgeon'));*/
		$this->load->library('rest');
		$config = array('server' 			=> 'https://jsonplaceholder.typicode.com/posts',
				//'api_key'			=> 'Setec_Astronomy'
				//'api_name'		=> 'X-API-KEY'
				//'http_user' 		=> 'username',
				//'http_pass' 		=> 'password',
				'http_auth' 		=> 'Authorization: Bearer bbbb',
				//'ssl_verify_peer' => TRUE,
				//'ssl_cainfo' 		=> '/certs/cert.pem'
				);
		$this->rest->initialize($config);
		$username = 'rainergua';
		$tweets = $this->rest->get('');
		print_r(json_encode($tweets));
	}

}
