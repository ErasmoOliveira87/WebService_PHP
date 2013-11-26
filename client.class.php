<?php

require_once("lib/nusoap.php");

class Client{

	public $client;
	public $wsdl;
	public $err;
	public $result;

	public function Client(){	
		$this->setWSDL();
		$this->create_nusoapclient();
	}

	//Set your URL where you locate your web service here
	public function setWSDL(){
		$this->wsdl = 'http://localhost/ws/soap.php?wsdl';
	}

	public function create_nusoapclient(){
		$this->client = new soapclient($this->wsdl,'wsdl');
		$this->err = $this->client->getError();

		if($this->err){
			echo '<p>Error on contructor <pre>' . print_r($this->err) . '</pre></p>';
		}

	}

	public function call_soap($functionName, $param){
		$this->result = $this->client->call($functionName, array('name' => $param));
		print_r($this->result);
		$this->verify_fails();
	}

	public function verify_fails(){

		if($this->client->fault){
			echo 'Fail <pre>';
				print_r($this->result);
			echo '</pre>';
			echo '<h2>Request</h2><pre>' . $this->client->request . '</pre>';
			echo '<h2>Response</h2><pre>' . $this->client->response . '</pre>';
		}else{
			$this->err = $this->client->getError();

			if($this->err){
				echo '<br/>Erro 1<pre>';
					print_r($this->err);
				echo '</pre>';
			}
		}

	}

}
?>