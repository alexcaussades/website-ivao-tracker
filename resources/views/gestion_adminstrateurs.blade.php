@extends("layouts.app-auth")
@section("content")

<body class="container">
    <div class="row">
        <h1 class="mt-2">Gestion Admin</h1>

        @include("partials.nav-auth-dash")

        <div class="card text-white bg-dark">
            <div class="card-body">
                <form action="/gestion_adminstrateurs_users" method="get">
                    <div class="form-group">
                        <label for="">ADD OR REMOVE ADMIN</label>
                        <select class="form-control" name="id">

                            @foreach ($gestion_admin as $gestion_admins )
                            <option value="{{$gestion_admins->id}}">
                                {{$gestion_admins->name}}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-success mt-2">View </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</body>
@endsection

