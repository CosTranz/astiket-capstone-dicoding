<?php

namespace App\Controllers;

use App\Models\PlaceModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        helper('form');
        $placeModel = new PlaceModel();
        $userData = new UserModel();

        // Get place data
        $placeData = $placeModel->getAllData();

        // Get user data
        $userData = $userData->getAllData();

        $data = [
            'title' => 'Dashboard',
            'content' => 'v_place',
            'getData' => $placeData,
            'getDataUser' => $userData,
        ];

        return view('layout/template', $data);
    }
}
