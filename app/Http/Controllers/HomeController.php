<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Coach;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $coaches = Coach::withCount('clients')
            ->orderBy('clients_count', 'desc')
            ->take(5)
            ->get();

        $coachClients = [];
        foreach ($coaches as $coach) {
            $coachClients[] = [
                'coach' => $coach,
                'clients' => Client::where('client_id', $client->id)
                    ->where('active', 1)
                    ->with('days', 'location', 'salon', 'membership', 'coach')
                    ->take(5)
                    ->get(),
            ];
        }

        return view('home.index')
            ->with([
                'coachClients' => $coachClients,
            ]);
    }
}
