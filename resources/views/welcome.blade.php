<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.headPackage')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <section id="main">
        <div class="wrapper">
            <div class="main-con">
                <div class="main-details">
                    <h2>Forum</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis dignissimos repellendus
                        optio eligendi temporibus.</p>
                </div>
                <div class="main-form">
                    <form action="{{ route('login.user') }}" method="POST">
                        @csrf
                        <div class="field-con">
                            <input type="email" class="form-control" name="email"
                                value="{{ !empty(old('email')) ? old('email') : null }}" placeholder="Email" required>
                        </div>
                        <div class="field-con">
                            <input type="text" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <hr>
                    <div class="register-btn">
                        <a href="{{ route('register.user') }}" class="btn btn-success">Create new Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.plugin')
</body>

</html>