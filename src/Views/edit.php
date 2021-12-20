<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Add contact</title>
</head>

<body class="bg-light">
    <div class="container shadow rounded bg-white">
        <div class="row">
            <?php require_once __DIR__ . '/components/Navigation.php' ?>
            <div class="col-md-9 row align-items-center justify-content-center">
                <div class="col-md-6">
                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
                        <?php if ($model['success'] == true) : ?>
                            <div class="alert alert-success" role="alert">
                                Contact has been successfully edited.
                            </div>
                        <?php else : ?>
                            <div class="alert alert-danger" role="alert">
                                Contact failed to edit.
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card p-3">
                        <div class="card-header">
                            <h1 class="text-center fs-3">Edit contact</h1>
                        </div>
                        <div class="card-body">
                            <form action="/edit/id/<?= $model['data'][0]['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="d-grid gap-2">
                                    <input type="hidden" name="id" value="<?= $model['data'][0]['id'] ?>">
                                    <input class="form-control" type="text" name="name" value="<?= $model['data'][0]['name'] ?>">
                                    <input class="form-control" type="number" name="phone_number" value="<?= $model['data'][0]['phone_number'] ?>">
                                    <input class="form-control" type="hidden" name="image" value="<?= $model['data'][0]['image'] ?>">
                                    <input class="form-control" type="file" name="image" value="<?= $model['data'][0]['image'] ?>">
                                    <small class="text-success">Image must be 40x40 and cannot be more than 50kb</small>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- modal -->
    <?php require_once __DIR__ . '/components/Modal.php' ?>
    <!-- end of modal -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>