<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Coach;
use App\Models\Days;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $days = Days::withCount('clients')
            ->orderBy('clients_count', 'desc')
            ->take(5)
            ->get();

        $daysClients = [];
        foreach ($days as $day) {
            $daysClients[] = [
                'day' => $day,
                'clients' => Client::where('client_id', $client->id)
                    ->with('days', 'location', 'salon', 'membership', 'coach')
                    ->take(5)
                    ->get(),
            ];
        }

        return view('home.index')
            ->with([
                'daysClients' => $daysClients,
            ]);
    }
}
