@extends("layouts.app-auth")
@section("content")

<body class="container">
    <div class="row">
        <div class="col-12">
            <h1>Dashboard</h1>
        </div>
        @include("partials.nav-auth-dash")
    </div>
    <div class="card card-header">
        <h1>Welcome {{($data["name"])}}</h1>
        @if (session('admin') == 2)
        <div>Session Admin: <i class="bi bi-check-circle-fill text-success"></i></div>
        @endif
        @if (session('admin') == 1)
        <div>Session admin: <i class="bi bi-check-circle-fill text-warning"></i></div>

        @endif
    </div>

    <div class="col mt-2">
        <div class="gridUsers">
            <div class="card card-body">1</div>
            <div class="card card-body">1</div>
            <div class="card card-body">1</div>
            <div class="card card-body">1</div>
            <div class="card card-body">1</div>
        </div>
    </div>

    @if (session('admin') <= 2 && session('admin')>= 1)
        <hr>
        <h2>Moderateur</h2>
        <div class="col mt-2 gridUsers">
            <div class="card card-body">
                <a href="#" class="text-decoration-none text-dark">
                    <div class=" d-flex justify-content-center align-items-center"> <i class="bi bi-person-add fs-2 text-success mx-2"></i> Creat Users</div>
                </a>
            </div>
            <div class="card card-body">
                <a href="#" class="text-decoration-none text-dark">
                    <div class=" d-flex justify-content-center align-items-center"> <i class="bi bi-person-up fs-2 text-primary mx-2"></i> Modify Users</div>
                </a>
            </div>
            <div class="card card-body">
                <a href="#" class="text-decoration-none text-dark">
                    <div class=" d-flex justify-content-center align-items-center"> <i class="bi bi-card-list fs-2 text-warning mx-2"></i>Logs Moderateurs</div>
                </a>
            </div>
        </div>
        @endif

        @if (session('admin') == 2)
        <hr>
        <h2>Adminstrateur</h2>
        <div class="col mt-2 gridUsers">
            <div class="card card-body">
                <a href="#" class="text-decoration-none text-dark">
                    <div class=" d-flex justify-content-center align-items-center"><i class="bi bi-person-dash-fill fs-2 text-danger mx-2"></i>Remove Users</div>
                </a>
            </div>
            <div class="card card-body">
                <a href="#" class="text-decoration-none text-dark">
                    <div class=" d-flex justify-content-center align-items-center"><i class="bi bi-shield-shaded fs-2 text-success mx-2"></i> Add / Remove moderateurs </div>
                </a>
            </div>
            <div class="card card-body">
                <a href="admin/gestion_adminstrateurs" class="text-decoration-none text-dark">
                    <div class=" d-flex justify-content-center align-items-center text-success"><i class="bi bi-shield-fill-check fs-2 text-danger mx-2"></i>Add / Remove Administrteurs </div>
                </a>
            </div>
            <div class="card card-body">
                <a href="#" class="text-decoration-none text-dark">
                    <div class=" d-flex justify-content-center align-items-center"><i class="bi bi-rss-fill fs-2 text-warning mx-2"></i>RSS</div>
                </a>
            </div>
        </div>
        @endif
</body>
@endsection

@extends("layouts.app-footer-auth")