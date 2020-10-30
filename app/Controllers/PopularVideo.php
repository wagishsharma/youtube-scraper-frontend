<?php namespace App\Controllers;

class PopularVideo extends BaseController
{	
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		return $this->show_all_popular_videos();
	}

	public function show_all_popular_videos(){
		$data['title'] = 'Videos';
		$data['videos'] = $this->genericAPIcall(getenv('SERVER_URL').'api/trending');
	    echo view('templates/header', $data);
	    echo view('pages/home', $data);
	    echo view('templates/footer', $data);
	}

	public function show_video($id=""){
		
		
		$data['video_details'] = $this->genericAPIcall(getenv('SERVER_URL').'api/videos/'.$id);
		$data['title'] = $data['video_details']->video->title;
		echo view('templates/header', $data);
	    echo view('pages/video_details', $data);
	    echo view('templates/footer', $data);
		
	}
	public function refresh_popular_videos(){
		
		$this->genericAPIcall(getenv('SERVER_URL').'api/trending','POST');
		return $this->show_all_popular_videos();
		
	}

	
}
