<?php

namespace app\Controllers;

use app\Models\Proveedor;

class HomeController extends Controller
{
    public function index(){

        return $this->view('home');

    }

}