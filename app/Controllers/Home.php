<?php namespace App\Controllers;

class Home extends BaseController
{	
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{

		$data['title'] = 'Home';
		$data['videos'] = $this->genericAPIcall('http://localhost:8080/api/trending');
	    echo view('templates/header', $data);
	    echo view('pages/home', $data);
	    echo view('templates/footer', $data);
	}

	public function show_video($id=""){
		
		$data['title'] = 'Video';
		$data['video_details'] = $this->genericAPIcall('http://localhost:8080/api/videos/'.$id);
		echo view('templates/header', $data);
	    echo view('pages/video_details', $data);
	    echo view('templates/footer', $data);
		
	}
	public function refresh_popular_videos(){
		
		$this->genericAPIcall('http://localhost:8080/api/trending','POST');
		return $this->index();
		
	}

	public function genericAPIcall($url,$method='GET',$params=[]){
		$client = \Config\Services::curlrequest();
		$response = $client->request($method, $url,$params);
		return json_decode($response->getBody());
	}
}
