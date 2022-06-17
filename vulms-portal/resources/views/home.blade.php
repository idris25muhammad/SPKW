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
            <div class="col-12 alert alert-info mx-3">
                <div class="alert-title">
                    {{ $item->app_name }}
                </div>
                <div class="text-muted">
                  <small>  {{ $item->description }} </small> 
                    
                    <div class="mt-3">
                            <label class="form-label"><small> Your Progress so far :</small></label>
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

            @empty
            <div class="alert alert-primary">
                Belum ada vulnerable application saat ini.
            </div>

            @endforelse


            </div>
        </div>
    </div>
@endsection