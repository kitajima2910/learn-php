<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- <title>Title</title> -->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="process.php" method="post">
                    <h2>Create New Book</h2>
                    <table class="table">
                        <tr>
                            <th>Title:</th>
                            <td><input type="text" name="title" required></td>
                        </tr>
                        <tr>
                            <th>Author:</th>
                            <td><input type="text" name="author" required></td>
                        </tr>
                        <th>Edition:</th>
                        <td><input type="number" name="edition" min="0" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" name="btnAdd" class="btn btn-primary">Create</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>