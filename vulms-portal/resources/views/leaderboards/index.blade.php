@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="text-left"> 
                        <span class="pull-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                            <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                        </svg>
                        {{ __('Leaderboards') }} 
                        </span> 
            </h2>
            Berikut perolehan poin tertinggi untuk seluruh tantangan di semua aplikasi rentan :
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div>
                    
                        <ul class="list-group">                   
                            @php $i=1 @endphp
                            @foreach ($ranks as $item)         
                                <li class="list-group-item"> # {{$i++}}. <strong> {{ $item->user->name }} </strong> : {{ $item->totalpoints }} points</li>                  
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
