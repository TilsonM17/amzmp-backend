<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ClientController extends BaseController
{
    public function listAll()
    {
        return view('client/list_all');
    }

    public function createClient()
    {
        return view('client/create_client');
    }
}
