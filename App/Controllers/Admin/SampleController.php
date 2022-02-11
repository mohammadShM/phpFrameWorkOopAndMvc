<?php

namespace App\Controllers\Admin;

use Core\Controller;

class SampleController extends Controller
{

    public function index(): string
    {
        return "SampleController Index Page <br/>";
    }

}