<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>

<body class="bg-light">
    <div class="container">
        <div style="height: 100vh;" class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <?php if ($model) : ?>
                    <div class="alert alert-danger my-2" role="alert">
                        <?= $model['message'] ?>
                    </div>
                <?php endif; ?>
                <div class="card shadow">
                    <div class="card-header bg-white">
                        <h1 class="text-center">LOGIN</h1>
                    </div>
                    <div class="card-body">
                        <form action="/login" method="POST">
                            <div class="d-grid gap-2">
                                <div class="form-floating">
                                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="admin123">
                                    <label for="floatingInput">Username</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>