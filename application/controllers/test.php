<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('es_model');
	}

	public function index()
	{
		echo "test page";
	}

	public function query(){

		$content['query']['match']['firstname'] = "Mcgee";
		$content['query']['from'] = 0;
		$content['query']['size'] = 1;
		$param['content'] = json_encode($content);
		$param['index'] = "bank";
		$param['field'] = "account";

		$result = $this->es_model->query( $param );
		echo $result;
	}

	public function put(){

		$content = array(
			"user" => "kimchy",
   			"postDate" => "2009-11-15T13:12:00",
    		"message" => "Trying out Elasticsearch, so far so good?"
			);

		$param['content'] = json_encode($content);
		$param['index'] = "twitter";
		$param['field'] = "tweet";
		$param['key'] = '3';

		$result = $this->es_model->put( $param );
		echo $result;
	}

	public function get(){

		$param['index'] = "twitter";
		$param['field'] = "tweet";
		$param['key'] = '3';

		$result = $this->es_model->get( $param );
		echo $result;
	}

	public function writeExample(){

		$index = 'bank';
		$type = 'account';
		$key = 0;

		$param['index'] = $index;
		$param['field'] = $type;

		$filepath = 'assets/accounts.json';
		$fp = fopen($filepath , 'r');
		while(!feof($fp)){
			$line = fgets($fp);
			$json = json_decode($line);
			if(!is_object($json))
				continue;
			if(property_exists($json, 'index')){
				$key = $json->index->_id;
			}else{
				$param['key'] = $key;
				$param['content'] = $line;
				$result = $this->es_model->put( $param );
				echo $result;
			}
		}

	}

	public function is(){
		$string = '{"index":{"_id":"1"}}';
		$json = json_decode($string);

		echo property_exists($json, 'index');

		var_dump($json);
	}

	
}
