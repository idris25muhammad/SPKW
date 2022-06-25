@extends('layouts.app')

@section('custom_styles')

@endsection

@section('content')
    <div class="page-body">
        <div class="jumbotron jumbotron-fluid mb-15">
       
            <div class="container">
                
                <h1 class="text-left"> 
                    <span class="pull-left">   
                        Selamat Datang di SPKW, {{ auth()->user()->name ?? null }}. 
                    </span> 
                </h1>
            </div>
        </div>

        <div class="container-xl">
        <div class="row">
          @forelse ($vulnapps as $item)

            @if ($item->gamified==1)
            <div class="col-12 alert alert-danger bg-danger">
                <div class="alert-title text-white">
                    <h2> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                        <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>
                        <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    </svg>   
                    {{ $item->app_name }}
                    </h2>
                </div>
                <div class="text-white">
                  <small>  {{ $item->description }} </small> 
                    
                    <div class="mt-3">
                            <label class="form-label"><small> Progres anda pada aplikasi ini :</small></label>
                            <div class="progress mb-2" style="height: 30px;">
                                @if ($item['total']>0) 
                                    @php $persentase =  ($item['completed'] / $item['total'])*100   @endphp
                                @else
                                    @php $persentase = 0   @endphp
                                @endif
                              <div class="progress-bar progress-bar-striped bg-success" style="width: {{$persentase}}%" role="progressbar" aria-valuenow="{{ $item['completed'] }}" aria-valuemin="0" aria-valuemax="{{ $item['total'] }}" aria-label="90% Complete">
                                <span >{{number_format($persentase,1)}}% Complete</span>
                              </div>
                            </div>
                           
                          </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
                    <a href="{{ route('challenges.index',['id'=>$item->id]) }}" class="btn btn-dark btn-pill w-120 my-3">
                        Learn Now
                    </a>
                  </div>
            </div>
            @else
            <div class="col-4 border-left border border-white border-5 bg-primary my-1">
                <div class="alert-title text-white mt-3 px-3">
                    <h2> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                        <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>
                        <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    </svg>
                    {{ $item->app_name }} </h2>
                </div>
                <div class="text-white px-3">
                  <small>  {{ $item->description }} </small> 
                    
                    <div class="mt-3">
                          <span class="badge badge-pill bg-info">  Belum ada integrasi gamifikasi </span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 px-3">
                    <a href="{{ $item->link }}" target="_blank"  class="btn btn-dark btn-pill w-120 my-3">
                        Learn Now
                    </a>
                  </div>
            </div>
            @endif
            @empty
            <div class="alert alert-primary">
                Belum ada vulnerable application saat ini.
            </div>

            @endforelse


            </div>
        </div>
    </div>
@endsection