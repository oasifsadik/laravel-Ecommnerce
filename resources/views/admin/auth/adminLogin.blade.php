<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ecommerce | Admin Login</title>


    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/bracket.css') }}">
</head>

<body>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
            <span class="tx-normal">[</span> Admin <span class="tx-info">Login</span> <span class="tx-normal">]</span>
        </div>

        <form action="{{ route('admin.login.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Enter your email">
                            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            </div>

            <div class="form-group">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="flex-1">
                        <input class="checkbox-custom" type="checkbox" name="remember"
                               id="remember" >
                        <label for="remember" class="checkbox-custom-label">Remember me</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>


    </div><!-- login-wrapper -->
</div><!-- d-flex -->

<script src="{{ asset('backend/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
