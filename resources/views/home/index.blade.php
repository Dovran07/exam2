@extends('layouts.app')
@section('content')
    @foreach($coachClients as $coachClient)
        <div class="border-top">
            <div class="container-xl py-4">
                <div class="h5 mb-3">
                    <a href="{{ route('home.index', ['coach' => $coachClient['coach']->id]) }}" class="link-dark text-decoration-none">
                        {{ $coachClient['coach']->name }}
                    </a>
                    <span class="text-secondary">({{ $coachClient['coach']->clients_count }} @lang('Clients'))</span>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
                    @foreach($coachClient['clients'] as $client)
                        <div class="col">
                            @include('home.index')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach


