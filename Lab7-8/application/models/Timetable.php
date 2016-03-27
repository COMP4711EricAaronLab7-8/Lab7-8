<?php


class Timetable extends CI_Model{
    protected $xml = null;
    protected $timeslot = array();
    protected $dayofweek = array();
    protected $class = array();
    protected $room = array();
    protected $instructor = array();
    protected $type = array();


public function __construct(){
    parent::__construct();
    $this->xml = simplexml_load_file(DATAPATH, "timetableXML.xml");
    
    foreach($this->xml->dayofweek as $day){
        $this->dayofweek[(string) $day['code']] = (string) $day;
    }
    foreach($this->xml->class as $class){
        $this->class[(string) $class['code']] = (string) $class;
    }
    
    foreach($this->xml->course as $course){
        $this->course[(string) $course['code']] = (string) $course;
    }
    foreach($this->xml->timeslot as $slot){
        $this->timeslot[(string) $slot['code']] = (string) $slot;
    }
    
    
    foreach($this->xml->dayofweek as $day){
        $this->dayofweek = new Booking($day);
    }
    foreach($this->xml->class as $class){
        $this->class = new Booking($class);
    }
    foreach($this->xml->course as $course){
        $this->course = new Booking($course);
    }
    
    foreach($this->xml->timeslot as $slot){
        $this->timeslot = new Booking($slot);
    }
    
}

function dayofweeks(){
    return $this->dayofweek;
}

function classes(){
    return $this->class;
}

function courses(){
    return $this->course;
}

function timeslots(){
    return $this->timeslot;
}

}

class Booking extends CI_Model{
    
    public $dataarray = array();
    
    function __construct($data){
        $this->code = (string) $data['code'];
        $this->name = (string) $data;
        $this->dataarray[$this->code] = $this->name;
    }
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

