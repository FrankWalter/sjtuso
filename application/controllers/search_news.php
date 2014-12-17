<?php 
require 'vendor/autoload.php';
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_news extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Shanghai");
	}

	private $limit = 10;

	public function index()
	{

		$offset = $this->input->get_post('offset');
		$keyword = $this->input->get_post('keyword');

		$search_data = array(
			'keyword' => $keyword ,
			);
        $null_flag=0;
		$page_data = array();
		$page_data['search_data'] = $search_data;

		list($result , $total) = $this->query_news($search_data , $this->limit , $offset);

		//did not find any results
		if($total ==0 && $keyword!=null){
			$this->load->view('header' , $page_data);
			$this->load->view('news/search_form_news');
			$this->load->view('cant_find');			
			return ;
		}
		//页码导航
		$link_config = array(
			'total' => $total,
			'offset' => $offset,
			'search_data' => $search_data ,
			'pre_url' => 'index.php/search_news' ,
			);
		$this->load->model('pagination_model');
		$page_data['link_array'] = $this->pagination_model->create_link($link_config);
		$page_data['result'] = $result;
		$page_data['total'] = $total;

		$this->load->view('header' , $page_data);
		$this->load->view('news/search_result_news');	
		$this->load->view('news/search_form_news');

		$this->load->view('footer');
		
	}
	public function query_news( $search_data , $limit , $offset ){
		$this->load->model('getMillisecond_model');
		$keyword = $this->input->get_post('keyword');
		$conn=array();
		$conn['hosts']=array('104.207.149.222:9200');
		$client = new Elasticsearch\Client($conn);
		$params = array();
		$params['index']='news';
		$params['type']=['news'];
		$params['body']= [
		    'query'=>[
                'function_score'=>[
                     'query'=>[
                          'multi_match'=>[
                              'fields'=>["title^3","text","content"],
                              'query'=>$keyword
                          ]
                     ],
                     'functions'=>[
                           [                          
                           'script_score'=>[
                                 'script'=>"_score*exp(doc['modified_time'].value/100000000-1)"
                           ]           
                           ]
                     ],
                     'boost_mode'=>"replace"                  
                 ]
		    ],
		    'highlight'=>[
                 'fields'=>[
                       'content'=>[
                       	    'type'=>"plain"
                       ]
                 ]
		    ],
		    'from'=>$offset?$offset:0,
		    'size'=>$limit,
		    'explain'=>true
		];	
		$content=$client->search($params);
		$json = json_encode($content);
		$json = json_decode($json);

		//did not find any results
		if(!property_exists($json, 'hits') )
			return array(null , 0);

		$total = $json->hits->total;
		if($total == 0)
			return array(null , 0);

		$entries = $json->hits->hits;
		$result = array();
		$result['hits']=$json->hits->total;
		foreach ($entries as $key => $entry) {
			$result[$key] = array();
			$result[$key]['title'] = $entry->_source->title;
			$result[$key]['text'] = mb_substr($entry->_source->text, 0 , 100 );
			$result[$key]['url'] = $entry->_source->url ;
			//$result[$key]['modified_time'] = $entry->_source->modified_time;
			$result[$key]['modified_time'] = date('Y-m-d H:i:s' , $entry->_source->modified_time);
			$result[$key]['score']=$entry->_score;
		}
		return array($result , $total);
	}
	
}
