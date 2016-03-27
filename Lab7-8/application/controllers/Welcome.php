<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	function __construct()
	{
		parent::__construct();
                $this->load->model('Timetable');
	}
        
        function index(){
            $this->load->helper('directory');
            $candidates = directory_map(DATAPATH);
            sort($candidates);
            $table[] = array('name' => substr('timetableXML.xml', 0, -4));
            $this->data['timetable'] = $table;
            $this->data['pagebody'] = 'homepage';
            $this->render();
        }

	
}
