<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Register</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="App">
            <div class="vertical-center">
                <div class="inner-block">
                    <form action="/register" method="post">
                        <h3>Register</h3>
                        <?php echo $message; ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="name" />
                        </div>

                        <div class="form-group">
                            <label>Document</label>
                            <input type="text" class="form-control" name="document" id="document" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" />
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control" name="country" id="country">
                                <?php foreach($countries as $country){ ?>
                                <option value="<?php echo $country->name ?>"><?php echo $country->name ?></option>
                                <?php } ?> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="password" />
                        </div>

                        <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">
                            Register
                        </button>
                        <a href="/login" class="btn btn-outline-primary btn-lg btn-block">
                            Login
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>