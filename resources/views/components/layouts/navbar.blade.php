<div class="container-fluid">
    <div class="row border-top px-xl-5">
        {{-- <div class="col-lg-3 d-none d-lg-block">
        </div> --}}
        <div class="col-lg-12 d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                {{-- <a href="{{ route('index') }}" class="text-decoration-none d-block d-lg-none">
                    <h1 class="text-primary m-0">CHREC</h1>
                </a> --}}
                <img src="{{ asset('@assets/img/chrec.png') }}" style="width:70%;" class="text-decoration-none d-block d-lg-none">
                
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="https://covenantuniversity.edu.ng/" target="_blank" class="nav-item nav-link">CU Home</a>
                        <a href="{{ route('index') }}" class="nav-item nav-link {{ $menutitle == 'home' ? 'active': ''}}">CHREC Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link {{ $menutitle == 'about' ? 'active': ''}}">About</a>
                        <a href="{{ route('committee') }}" class="nav-item nav-link {{ $menutitle == 'committee' ? 'active': ''}}">Committee</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle {{ $menutitle == 'ethical' ? 'active': ''}}" data-toggle="dropdown">Ethical Approval</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('application-checklist') }}" class="dropdown-item">Application checklist</a>
                                <a href="{{ route('application-forms') }}" class="dropdown-item">Application forms</a>
                                <a href="{{ route('apply') }}" class="dropdown-item">Apply</a>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="nav-item nav-link {{ $menutitle == 'contact' ? 'active': ''}}">Contact</a>
                    </div>
                    {{-- <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="{{ route('apply') }}">Apply Now</a> --}}
                </div>
            </nav>
        </div>
    </div>
</div>