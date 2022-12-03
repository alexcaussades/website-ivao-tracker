@extends("layouts.gen-header")

@section('content')

<!-- Default form login -->
<div class="container mt-5 align-self-center">
    <form class="border border-light p-5 bg-dark bg-opacity-75 text-white shadow-lg p-5 mb-5 rounded" action="login" method="post">
        @csrf
        <p class="h4 mb-4 text-center"><i class="bi bi-arrow-return-right"></i> Sign In <i class="bi bi-arrow-return-left"></i></p>

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
            <button type="submit" class="btn btn-outline-success text-center text-capitalize mx-2"><i class="bi bi-sign-turn-slight-right-fill fs-5"></i> Verify me !</button>
            <!-- <a href="./register" class="btn btn-outline-info text-center text-capitalize mx-2"><i class="bi bi-person-fill-add fs-5"></i> Sign Up !</a>
            <a href="" class="btn btn-outline-warning text-center text-capitalize"><i class="bi bi-shield-lock fs-5"></i> Forgot Password !</a> -->
        </div>
    </form>
</div>

@endsection