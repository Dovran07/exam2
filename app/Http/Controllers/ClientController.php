<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Coach;
use App\Models\Days;
use App\Models\Location;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'days' => 'nullable|array|min:0',
            'days.*' => 'nullable|integer|min:1',
            'locations' => 'nullable|array|min:0',
            'locations.*' => 'nullable|integer|min:1',
            'salons' => 'nullable|array|min:0',
            'memberships.*' => 'nullable|integer|min:1',
            'coaches' => 'nullable|array|min:0',
            'coaches.*' => 'nullable|integer|min:1',
            'clients' => 'nullable|array|min:0',
            'clients.*' => 'nullable|integer|min:1',
            'color' => 'nullable|integer|min:0',
            'sort' => 'nullable|string|in:new-to-old,old-to-new,low-to-high,high-to-low',
            'page' => 'nullable|integer|min:1',
        ]);

        $f_days = $request->has('days') ? $request->days : [];
        $f_locations = $request->has('locations') ? $request->locations : [];
        $f_salons = $request->has('salons') ? $request->salons : [];
        $f_memberships = $request->has('memberships') ? $request->memberships : [];
        $f_coaches = $request->has('coaches') ? $request->coaches : [];
        $f_clients = $request->has('clients') ? $request->clients : [];
        $f_sort = $request->has('sort') ? $request->sort : null;

        $clients = Client::when($f_days, function ($query) use ($f_days) {
            $query->whereIn('days_id', $f_brands);
        })
            ->when($f_locations, function ($query) use ($f_locations) {
                $query->whereIn('location_id', $f_locations);
            })
            ->when($f_salons, function ($query) use ($f_salons) {
                $query->whereIn('salon_id', $f_salons);
            })
            ->when($f_memberships, function ($query) use ($f_memberships) {
                $query->where('membership_id', $f_memberships);
            })
            ->when($f_coaches, function ($query) use ($f_coaches) {
                $query->whereIn('coach_id', $f_coaches);
            })
            ->when($f_clients, function ($query) use ($f_clients) {
                $query->where('client_id', $f_clients);
            })
            ->with('days', 'location', 'salon', 'membership', 'coach', 'client')
            ->when(isset($f_sort), function ($query) use ($f_sort) {
                if ($f_sort == 'old-to-new') {
                    $query->orderBy('id');
                } elseif ($f_sort == 'high-to-low') {
                    $query->orderBy('price', 'desc');
                } elseif ($f_sort == 'low-to-high') {
                    $query->orderBy('price');
                } else {
                    $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->withQueryString();

        $days = Days::orderBy('name')
            ->get();
        $locations = Location::orderBy('name')
            ->get();
        $salons = Salon::orderBy('name')
            ->get();
        $coaches = Coach::orderBy('name')
            ->get();
        $clients = Client::orderBy('name')
            ->get();

        return view('car.index')
            ->with([
                'days' => $days,
                'locations' => $locations,
                'clients' => $clients,
                'salons' => $salons,
                'coaches' => $coaches,
                'clients' => $clients,
                'f_days' => $f_days,
                'f_locations' => $f_locations,
                'f_salons' => $f_salons,
                'f_coaches' => $f_coaches,
                'f_clients' => $f_clients,
                'f_sort' => $f_sort,
            ]);
    }


    public function show($id)
    {
        $client = Client::when(function ($query) {
        })
            ->with('days', 'location', 'salon', 'membership', 'coach', 'clients')
            ->findOrFail($id);

        $similar = Client::where('days_id', $client->days>id)
            ->where('location_id', $client->location->id)
            ->where('salon_id', $client->salon->id)
            ->where('membership_id', $client->membership->id)
            ->where('coach_id', $client->coach->id)
            ->with('brand', 'location', 'year', 'color')
            ->take(4)
            ->get();

        return view('car.show')
            ->with([
                'client' => $client,
                'similar' => $similar,
            ]);
    }


    public function active(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors(),
            ], Response::HTTP_OK);
        }

        $client = Client::findOrFail($request->id);
        $car->update();

        return response()->json([
            'status' => 0,
        ], Response::HTTP_OK);
    }
}
