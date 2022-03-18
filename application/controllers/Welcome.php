<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function event_trigger()
	{
		require APPPATH . '/vendor/autoload.php';

		$pusher = new Pusher\Pusher(
			'key',
			'secret',
			'app_id',
			array(
				'cluster' => 'ap3',
				'useTLS' => true
			)
		);
	
		$data  = "testing....";
		$pusher->trigger('my-channel', 'my-event', $data);
		echo $data;
	}
}