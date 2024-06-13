<?php

namespace App\Controllers;

use App\Models\PlaceModel;
use App\Models\UserModel;

class Main extends BaseController
{
    public function index()
    {
        // $session = session();
        // if ($session->get('customer') == null) {
        //     return redirect()->to(base_url("User/loginman"));
        // }
        $data = [
            'title' => 'Home',
            'content' => 'mainpages/home',
        ];
        return view('mainpages/template', $data);
    }
    public function landingpage()
    {
        $data = [
            'title' => 'Landing Page',
            'content' => 'mainpages/landingpage',
        ];
        return view('mainpages/template', $data);
    }
    public function browse()
    {
        $data = [
            'title' => 'Browse',
            'content' => 'mainpages/browse',
        ];
        return view('mainpages/template', $data);
    }
    public function contact()
    {
        helper('form');
        $data = [
            'title' => 'Contact',
            'content' => 'mainpages/contact',
        ];
        return view('mainpages/template', $data);
    }
    public function tiket()
    {
        $session = session();
        if ($session->get('customer') == null) {
            return redirect()->to(base_url("User/loginman"));
        }
        helper('form');
        $model = new PlaceModel();
        $data = [
            'title' => 'Tiket',
            'content' => 'mainpages/tiket',
            'getData' => $model->getAllData(),
        ];

        return view('mainpages/template', $data);
    }
    public function verif()
    {
        $data = [
            'title' => 'Payment',
            'content' => 'mainpages/verpay',
        ];
        return view('mainpages/template', $data);
    }
}
