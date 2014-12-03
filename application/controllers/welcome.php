<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $url = 'http://104.207.149.222:9200/jdbc/jdbc/_search?q=text:';

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

		if($json->hits->total !=0){
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
		else{
			$this->load->view('header');
			$this->load->view('cant_find');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */