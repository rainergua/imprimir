<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Rest Client
 *
 * @package generic
 * @author André Gonçalves
 * @copyright Copyright (c) 2013 Reimagine
 * @link reimagine.cc
 * @since Version 1.0
 * @version 1.0
 *
 */

// ------------------------------------------------------------------------

/**
 * Main
 *
 * @package generic
 * @subpackage Controllers
 * @category Controllers
 * @author André Gonçalves
 *
 */
Class RestClient extends  CI_Controller {
	
	private $data;
	
	public function __construct() {
		parent::__construct();
		$this->data = array();
		//setlocale(LC_MONETARY, 'pt_BR');
	}
	
	/**
	 * query
	 */
	public function query() {
		$return = array();
		$headers = array('Content-Type: text/xml', 'Authorization: Bearer test');
		$url = 'http://localhost/imprimir/restctrlr/?id=1';
		$config = array(
				'url' => $url
				,'verb' => 'GET'
				,'requestBody' => ''
				,'headers' => $headers
			);
		$this->load->library('restclient', $config);
		$this->restclient->execute();
		$result = $this->restclient->getResponseBody();
		
		//$xml = simplexml_load_string($result);
		print_r($result);
	}

	function ci_curl()
	{
		$username = 'admin';
		$password = '1234';
		$this->load->library('curl');
		$this->curl->get('http://localhost/imprimir/restctrl/?id=0');
		
		/* Optional, delete this line if your API is open
		$this->curl->http_login($username, $password);
	
		$this->curl->post(array(
			'name' => $new_name,
			'email' => $new_email
		));
		
		$result = json_decode($this->curl->execute());
	
		if(isset($result->status) && $result->status == 'success')
		{
			echo 'User has been updated.';
		}
		
		else
		{
			echo 'Something has gone wrong';
		}*/
		$curl = new Curl();
		$curl->setHeader('X-Requested-With', 'XMLHttpRequest', 'Authorization: Bearer test');
		$curl->get('http://localhost/imprimir/restctrl', array(
			'id' => '1',
		));
		var_dump($curl->requestHeaders);
		var_dump($curl->responseHeaders);
	}
}