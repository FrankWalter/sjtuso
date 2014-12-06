<?php
class Es_model extends CI_Model
{

	private $server_addr = "104.207.149.222:9200";
	function __construct() {
		parent::__construct();

	}

	function hello(){
		return curl_json($this->server_addr);
	}

	function query( $param ){

		if( !isset($param['content'])) return false;
		if( !isset($param['index'])) return false;

		$url = $this->server_addr;
		$url .= '/' . $param['index'] ;

		if( isset($param['field']) )
			$url .=  '/' . $param['field'] ;

		//because it is query function
		$url .= '/_search';

		$result = $this->curl_json( $url , $param['content'] );
		return $result;
	}

	function put( $param ){

		if( !isset($param['content'])) return false;
		if( !isset($param['index'])) return false;
		if( !isset($param['field'])) return false;
		if( !isset($param['key'])) return false;

		$url = $this->server_addr;
		$url .= '/' . $param['index'] ;
		$url .= '/' . $param['field'] ;
		$url .= '/' . $param['key'] ;

		return $this->curl_json( $url , $param['content'] );
	}


	function get( $param ){

		if( !isset($param['index'])) return false;
		if( !isset($param['field'])) return false;
		if( !isset($param['key'])) return false;

		$url = $this->server_addr;
		$url .= '/' . $param['index'] ;
		$url .= '/' . $param['field'] ;
		$url .= '/' . $param['key'] ;

		return $this->curl_json( $url );
	}


	private function curl_json( $URL , $post_data = null ){

		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL , $URL );

	    if($post_data == null){
	    	curl_setopt ( $ch, CURLOPT_POST , false ); 
	    }else{
	    	curl_setopt ( $ch, CURLOPT_POST , true ); 
	    	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data  ) ;
	    }

	    //get return data
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $ret = curl_exec($ch);
	    curl_close($ch);
	    return $ret;
	}


}