@extends("layouts.app-auth")
@section("content")

<body class="container">
    <div class="row">
        <h1 class="mt-2">Change Type Users</h1>
       
        @include("partials.nav-auth-dash")
      
          <div class="card text-white bg-dark">
            <div class="card-body">
              <h4 class="card-title">{{ $gestion_admin->name }}</h4>
              <p class="card-text">
                <div class="form-group">
                  <label for="">Email:</label>
                  <input type="text"
                    class="form-control" name="email" value="{{ $gestion_admin->email }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Vid:</label>
                  <input type="text"
                    class="form-control" name="vid" value="{{ $gestion_admin->vid }}" placeholder="empty VID">
                </div>
                <div class="form-group">
                  <label for="">Level Users</label>
                  <select class="form-control" name="lvl" id="">
                    <option value="{{ $gestion_admin->level }}" selected> Default value: {{$gestion_admin->level}}</option>
                    <option value="0">0 deactivate account</option>
                    <option value="1">1 Activate account</option>
                    <option value="2">2 Creator account</option>
                    <option value="7">7 Moderateur account</option>
                    <option value="8">8 Admin account</option>
                    <option value="9">9 Super Admin account</option>
                    <option></option>
                  </select>
                </div>
              </p>

                <form action="/gestion_adminstrateurs_users/{{ $gestion_admin->id }}" method="post">
                    @csrf
                    @method("PUT")
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </form>
            </div>
          </div>
          
        
    </div>
</body>
@endsection
