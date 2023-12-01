<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'about',
            'page' => 'v_about',
        ];
        return view('v_template', $data);
    }
}
