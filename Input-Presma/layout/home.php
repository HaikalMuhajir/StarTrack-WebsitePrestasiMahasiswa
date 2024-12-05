<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data=[
            'title' => "Halaman Home",
            $isi => 'v_home'
        ];
        $this->load->view('layout/all', $data);
    }
}