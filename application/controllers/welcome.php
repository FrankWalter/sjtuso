<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $url = 'http://192.168.8.114:9200/jdbc/jdbc/_search?q=text:';

	public function index()
	{
		$this->load->view('header');
		$this->load->view('search');
		
	}

	public function search(){
		echo "<meta charset=utf8>";

		$q = $this->input->get_post('q');

		$q = urlencode($q);

		$content = file_get_contents($this->url . $q);

		$json = json_decode($content);


		$entries = $json->hits->hits;

		// var_dump($entries);

		$result = array();

		foreach ($entries as $key => $entry) {
			$result[$key] = array();
			$result[$key]['title'] = $entry->_source->title;
			$result[$key]['text'] = mb_substr($entry->_source->text, 0 , 100 );
			$result[$key]['baseUrl'] = $entry->_source->baseUrl ;
			$result[$key]['fetchTime'] = date('Y-m-d H:i:s' , $entry->_source->fetchTime/1000 );
		}

		// var_dump($entry);
		$data = array('result' => $result , 'q' => urldecode($q) );
		$this->load->view('header');
		$this->load->view('page' , $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */