@extends("layouts.gen-header")

@section('content')

<!-- Default form login -->
<div class="container mt-5 align-self-center">
    <form class="border border-light p-5 bg-dark bg-opacity-75 text-white shadow-lg p-5 mb-5 rounded" action="creat_users" method="post">
        @csrf
        <p class="h4 mb-4 text-center"><i class="bi bi-arrow-return-right"></i> Sign Up <i class="bi bi-arrow-return-left"></i></p>

        <div class="form-group">
            <label for="" class="form-label fs-8 text-white fw-bold"><i class="bi bi-person-badge-fill"></i> Username :</label>
            <input type="text" name="username" id="defaultLoginFormEmail" class="form-control mb-4 rounded-5" placeholder="Your Username">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="" class="form-label fs-8 text-white fw-bold"><i class="bi bi-person-circle"></i> Login :</label>
            <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4 rounded-5" placeholder="Your Login">
        </div>

        <div class="form-group">
            <!-- Password -->
            <label for="" class="form-label fs-8 text-white fw-bold"><i class="bi bi-fingerprint"></i> Password :</label>
            <input type="password" name="password" id="defaultLoginFormEmail" class="form-control mb-4 rounded-5" placeholder="Your Password">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success text-center text-capitalize mx-2"><i class="bi bi-sign-turn-slight-right-fill fs-5"></i> create me !</button>
        </div>
    </form>
</div>

@endsection