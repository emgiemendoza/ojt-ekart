@extends('layout')

@section('title', 'Sign Up for an Account')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2>Create Account</h2>
            <div class="spacer"></div>

            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                <input id="password" type="password" class="form-control" name="password" placeholder="Password" placeholder="Password" required>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                    required>

                <div class="login-container">
                    <button type="submit" class="auth-button">Create Account</button>
                    <div class="already-have-container">
                        <p><strong>Already have an account?</strong></p>
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="auth-right">
            <h2>Personal Information Disclosure</h2>
            <div class="spacer"></div>
            {{-- <p><strong>Save time now.</strong></p> --}}
            <p>I hereby agree that with the submission of the foregoing information, I agree and allow for EEI Employee Development Cooperative (EEI EDC) to acquire and process from my person, Personal Information and/or Sensitive Personal Information, to be used by EEI EDC as part of its records keeping and use in any of its business operations.</p>

            {{-- &nbsp;
            <div class="spacer"></div>
            <p><strong>Loyalty Program</strong></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt debitis, amet magnam accusamus nisi distinctio eveniet ullam. Facere, cumque architecto.</p> --}}
        </div>
    </div> <!-- end auth-pages -->
</div>
@endsection
