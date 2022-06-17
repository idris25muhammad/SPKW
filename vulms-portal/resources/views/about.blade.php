@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Leaderboard') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    
                    <section id="sec-main" class="page-body">
                        @foreach ($ranks as $item)  {
                            {{ $item->user_id }} : {{ $item->totalpoints }}
                            <hr>
                        }
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
