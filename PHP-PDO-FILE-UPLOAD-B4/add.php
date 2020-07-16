<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>Add</title>
</head>

<body>

    <div class="container mt-3">

        <form action="process.php" method="POST" name="frmAdd" enctype="multipart/form-data" onsubmit="return validationForm()">
            <div class="form-group">
                <label for="txtName" class="col-sm-1-12 col-form-label">Name</label>
                <input type="text" class="form-control" name="txtName" required id="txtName" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="txtFile" class="col-sm-1-12 col-form-label">File</label>
                <input type="file" class="form-control-file" name="txtFile" required id="txtFile" accept="image/*">
            </div>
            <button type="submit" name="btnAdd" id="btnAdd" value="btnAdd" class="btn btn-success">Insert</button>
            <a class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
</body>

</html>