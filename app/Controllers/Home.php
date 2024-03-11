<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function panel(): string
    {
       
        return view('panel');
        
    }

    public function dashboard(): string
    {
       
        return view('dashboard');
        
    }

}
