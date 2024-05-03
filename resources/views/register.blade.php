<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.headPackage')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>

<body>
    <section id="register">
        <div class="wrapper">
            <div class="register-con">
                <div class="register-details">
                    <h2>Forum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis voluptatem reiciendis quis
                        in laborum odit!</p>
                </div>
                <form action="{{ route('register.user') }}" method="POST">
                    @csrf
                    <div class="field-con">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="field-con">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="field-con">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="register-btn">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                    <a href="{{ route('login') }}">Already have account? login here</a>
                </form>
            </div>
        </div>
    </section>

    @include('layouts.plugin')
</body>

</html>