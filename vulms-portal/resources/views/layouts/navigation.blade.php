<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    
                    <li class="nav-item @if(request()->routeIs('home')) active @endif">
                        <a class="nav-link" href="{{ route('home') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block text-black"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <img width="64px" src="{{ url('img/icon/app-development.png') }}"/>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Vulnerable Apps') }}
                            </span>
                        </a>
                    </li>
                    
                    <li class="nav-item @if(request()->routeIs('badges')) active @endif">
                        <a class="nav-link" href="{{ route('badges.index') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block text-black"><!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                            <img width="64px" src="{{ url('img/icon/medal.png') }}"/>

                                </span>
                            <span class="nav-link-title">
                                {{ __('Badges') }}
                            </span>
                        </a>
                    </li>

                    <li class="nav-item @if(request()->routeIs('leaderboards')) active @endif">
                        <a class="nav-link" href="{{ route('leaderboards.index') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block text-black"><!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                            <img width="64px" src="{{ url('img/icon/podium.png') }}"/>

                            </span>
                            <span class="nav-link-title">
                                {{ __('Leaderboard') }}
                            </span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</div>