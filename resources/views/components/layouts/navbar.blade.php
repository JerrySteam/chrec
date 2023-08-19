<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            {{-- <a class="d-flex align-items-center justify-content-between w-100 text-decoration-none" data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;"> --}}
            <a href="{{ route('index') }}" class="d-flex align-items-center justify-content-between w-100 text-decoration-none" data-toggle="collapse" style="height: 67px; padding: 0 30px;">
                <h1 class="text-primary m-0">CHREC</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="{{ route('index') }}" class="text-decoration-none d-block d-lg-none">
                    <h1 class="text-primary m-0">CHREC</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="{{ route('index') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('committee') }}" class="nav-item nav-link">Committee</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Application</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('application-checklist') }}" class="dropdown-item">Application checklist</a>
                                <a href="{{ route('application-forms') }}" class="dropdown-item">Application forms</a>
                                <a href="{{ route('apply') }}" class="dropdown-item">Apply</a>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                    <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="{{ route('apply') }}">Apply Now</a>
                </div>
            </nav>
        </div>
    </div>
</div>