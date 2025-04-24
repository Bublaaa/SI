<?php

namespace App\Controllers;

class PaginationController extends BaseController
{
    public function index(): string
    {
        return view('layout');
    }
}
