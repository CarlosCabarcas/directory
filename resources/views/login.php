<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Login</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Login form -->
    <div class="container">
        <div class="App">
            <div class="vertical-center">
                <div class="inner-block">

                    <form action="/login" method="post">
                        <h3>Login</h3>
                        <?php echo $message; ?>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email_login" id="email_login" />
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password_login"
                                id="password_login" />
                        </div>

                        <button type="submit" name="login" id="sign_in" class="btn btn-outline-primary btn-lg btn-block">Login</button>
                        <a href="/register" class="btn btn-outline-primary btn-lg btn-block">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>