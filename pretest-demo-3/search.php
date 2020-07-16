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
    <title>LAPTOP SHOP ONLINE | SEARCH</title>

    <style>
        .container {
            transform: translate(5%, 60%);
            width: 50%;
            border: 1px solid #000;
            border-radius: 10px;
        }

        form {
            padding: 20px;
        }
    </style>
</head>

<body>

    <center>
        <form action="" method="post">
            <h2>SEARCH BY PRICE</h2>
            <input type="number" name="min" id="" placeholder="input min price" class="form-control" required> <br><br>
            <input type="number" name="max" id="" placeholder="input max price" class="form-control" required> <br><br>
            <!-- <input type="summit" name="search" value="search" class="btn-outline-primary"> -->
            <button type="submit" name="search">search</button>
            <input type="button" name="back" value="back" class="btn-outline-primary" onclick="window.location='./index.php'">
        </form>
    </center>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "lapshop") or die("Cannot conenct");
    if (isset($_POST["search"])) {
        $min = $_POST["min"];
        $max = $_POST["max"];

        $sql = "select * from laptop where price between '$min' and '$max'";
        $stmt = mysqli_query($conn, $sql);
        if ($min >= 0 && $max >= 0) {
            echo "Laptop have price beween $min and $max are";
            echo "<table vorder='1' cellspacing='0' cellpadding='10'>";
            while ($rows = mysqli_fetch_assoc($stmt)) {
                echo "<tr>";
                echo "<td> {$rows['lapId']} </td>";
                echo "<td> {$rows['lapName']} </td>";
                echo "<td> {$rows['price']} </td>";
                echo "<td> {$rows['supplier']} </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>