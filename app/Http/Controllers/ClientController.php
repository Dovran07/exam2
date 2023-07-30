<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
        {
            dd();
            return Client::with('salon','membership', 'coach', 'days')
                ->inRandomOrder()
                ->first();
        }
}
