@extends('layouts.app')

@section('content')
    <div class="container-xl">
      <div class="row">
      <div class="col-md-7"> 
               <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
              Daftar Challenge
            </h2>  
                  
            Dapatkan poin dengan menyelesaikan tantangan yang diberikan berdasarkan <strong class="text-danger">severity rating</strong>
            <ul>
              <li> <strong> LOW </strong> : 25 Points</li>
              <li> <strong> MEDIUM </strong>  : 50 Points</li>
              <li> <strong> HIGH </strong>  : 75 Points</li>
              <li> <strong> CRITICAL </strong>  : 100 Points</li>
            </ul>
        </div>

      </div>
        <div class="col-md-5"> 
                <div class="card bg-danger">
                  <div class="card-stamp">
                    <div class="card-stamp-icon bg-white text-primary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">Score anda saat ini :</h3>
                    <h1>  <strong>  {{ $totalscore }} points </strong></h1>                 
                  </div>
                </div>
        </div>
</div>
       
 

    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
            
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Challenge</th>
                            <th>Objektif</th>
                            <th>Severity Risk Rating</th>
                            <th>Status</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @php
                          $i = 1;
                        @endphp
                        @forelse ($challenges as $item )
                            
                          <tr>
                            <td data-label="No">
                              <div> {{ $i }} </div>
                            </td>

                            <td data-label="Title">
                              <div>{{ $item->challenge->title }}</div>
                              <div class="text-muted">{{ $item->challenge->category_risk }}</div>
                            </td>

                            <td class="text-muted" data-label="Role">
                              <p>
                                {{ $item->challenge->objektif }}
                              </p>
                            </td>

                            <td class="text-muted" data-label="Role">
                                <span class="badge bg-danger">
                                  @php
                                    switch( $item->challenge->risk_rating ) {
                                      case 5 : $severity_level = "Critical"; break;
                                      case 4 : $severity_level = "High"; break;
                                      case 3 : $severity_level = "Medium"; break;
                                      case 2 : $severity_level = "Low"; break;
                                      case 1 : $severity_level = "Note"; break;
                                      default : $severity_level = "Unknown";
                                    }
                                  @endphp
                                  {{ $severity_level }}</span>
                            </td>
                            <td class="text-muted" data-label="Role">
                              @php
                                if ($item->status==0) {
                                  $statusColor = "bg-yellow"; $statusTxt="Unsolved"; 
                                } else {
                                  $statusColor = "bg-success"; $statusTxt="Solved";
                                }
                              @endphp

                                <span class="badge {{ $statusColor }}"> {{ $statusTxt }} </span>
                              </td>
                            <td>
                              <div class="btn-list flex-nowrap">
                                <div class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                   Detail Challenge
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#tutorialModal{{$i}}" role="button">
                                      Data Pengujian                                   
                                     </a>
                                
                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#toolsModal{{$i}}" role="button">
                                      Hints and Tooltips
                                    </a> 
                                  
                                  </div>
                                </div>


                                <div class="btn-list flex-nowrap">
                                <div class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                   Informasi
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                   
                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#aboutriskModal{{$i}}" role="button">
                                      Tentang Risiko Ini
                                    </a>
                                    <a class="dropdown-item"  target="_blank" href="https://cve.mitre.org/cgi-bin/cvename.cgi?name={{ $item->challenge->cve_id }}">
                                      Similar Incident Case (CVE)
                                    </a>       
                                  </div>
                                </div>
                                

                                @if ($item->status==1)
                                <a class="btn bg-teal"  data-bs-toggle="modal" data-bs-target="#counterModal{{$i}}" role="button">
                                  Countermeasure
                                </a>
                                @else
                                <a href="{{ $item->challenge->url_target }}" target="_blank" class="btn bg-indigo">
                                  Start Challenge
                                </a>
                                <a href="{{ route('challenge.flag', ['id' => $item->challenge_id]) }}" role="button" class="btn bg-teal">
                                  Submit Flag
                                </a>
                                @endif
                              
                              </div>
                            </td>
                          </tr>
                   
                        <!-- Modal tutorial -->
                        <div class="modal fade" id="tutorialModal{{$i}}" tabindex="-1" aria-labelledby="tutorialModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-info">
                                <h5 class="modal-title" id="tutorialModalLabel">Data Pengujian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                {{ $item->challenge->data_pengujian }}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        

                        <!-- Modal tool -->
                        <div class="modal fade" id="toolsModal{{$i}}" tabindex="-1" aria-labelledby="toolsModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-teal">
                                <h5 class="modal-title" id="toolModalLabel">Hints and Tooltips</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                {!! $item->challenge->tools !!}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal aboutrisk -->
                        <div class="modal fade" id="aboutriskModal{{$i}}" tabindex="-1" aria-labelledby="aboutriskModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-danger">
                                <h5 class="modal-title" id="taboutriskModalLabel">About This Security Risk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              {{ $item->challenge->description }}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Modal countermeasure -->
                        <div class="modal fade" id="counterModal{{$i}}" tabindex="-1" aria-labelledby="counterModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-success">
                                <h5 class="modal-title" id="counterModalLabel">Rekomendasi Countermeasure</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                {!! $item->challenge->countermeasure !!}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                          @php $i++; @endphp
                        
                        @empty
                        <tr> 
                          <td colspan=5> Mohon maaf, saat ini challenge belum tersedia </td> </tr>
                        @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>



@endsection
