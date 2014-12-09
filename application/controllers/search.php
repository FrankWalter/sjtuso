<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	private $limit = 10;

	public function index()
	{

		$offset = $this->input->get_post('offset');
		$keyword = $this->input->get_post('keyword');

		$search_data = array(
			'keyword' => $keyword ,
		);

		$page_data = array();
		$page_data['search_data'] = $search_data;

		list($result , $total) = $this->query($search_data , $this->limit , $offset);

		//did not find any results
		if($total ==0 ){
			$this->load->view('header' , $page_data);
			$this->load->view('search_form');
			$this->load->view('cant_find');
			
			
			return ;
		}

		//页码导航
		$link_config = array(
			'total' => $total,
			'offset' => $offset,
			'search_data' => $search_data ,
			'pre_url' => 'index.php/search' ,
			);
		$this->load->model('pagination_model');
		$page_data['link_array'] = $this->pagination_model->create_link($link_config);
		$page_data['result'] = $result;
		$page_data['total'] = $total;

		$this->load->view('header' , $page_data);
		$this->load->view('search_result');	
		$this->load->view('search_form');
					
		$this->load->view('footer');
		
	}

	public function query( $search_data , $limit , $offset ){

		$keyword = $search_data['keyword'];
		$content['query']['match']['text'] = $keyword;
		$content['from'] = $offset?$offset:0;
		$content['size'] = $limit;

		$param['content'] = json_encode($content);
		$param['index'] = "jdbc";
		$param['field'] = "jdbc";


		$this->load->model('es_model');
		$result_str = $this->es_model->query($param);

		if($result_str == null)
			return array(null , 0);

		$json = json_decode($result_str);

		//did not find any results
		if(!property_exists($json, 'hits') )
			return array(null , 0);

		$total = $json->hits->total;
		if($total == 0)
			return array(null , 0);

		$entries = $json->hits->hits;
		$result = array();
		foreach ($entries as $key => $entry) {
			$result[$key] = array();
			$result[$key]['title'] = $entry->_source->title;
			$result[$key]['text'] = mb_substr($entry->_source->text, 0 , 100 );
			$result[$key]['baseUrl'] = $entry->_source->baseUrl ;
			$result[$key]['fetchTime'] = date('Y-m-d H:i:s' , $entry->_source->fetchTime/1000 );
		}

		return array($result , $total);
	}
	
}
