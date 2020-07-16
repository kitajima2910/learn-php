<?php

$conn = mysqli_connect("localhost", "root", "", "lapshop") or die("Cannot conenct");
mysqli_set_charset($conn, "UTF8");

if (isset($_GET["code"])) {
    $code = $_GET["code"];
    $sql = "select * from laptop where lapId = '$code'";
    $stmt = mysqli_query($conn, $sql);

    while ($rows = mysqli_fetch_array($stmt)) {
        $lapId = $rows["lapId"];
        $lapName = $rows["lapName"];
        $price = $rows["price"];
        $supplier = $rows["supplier"];
    }
}

mysqli_close($conn);
?>

<form action="process.php" method="post">
    <div class="form-group row">
        <div class="col-md-12">
            <!-- <label for="code" class="col-sm-1-12 col-form-label">Code</label> -->
            <input type="hidden" class="form-control" name="code" id="code" placeholder="" value="<?= $lapId; ?>">
        </div>
        <div class="col-md-12">
            <label for="name" class="col-sm-1-12 col-form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="" value="<?= $lapName; ?>">
        </div>
        <div class="col-md-12">
            <label for="price" class="col-sm-1-12 col-form-label">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="" value="<?= $price; ?>">
        </div>
        <div class="col-md-12">
            <label for="supplier" class="col-sm-1-12 col-form-label">Supplier</label>
            <input type="text" class="form-control" name="supplier" id="supplier" placeholder="" value="<?= $supplier; ?>">
        </div>
        <div class="col-md-12 mt-3">
            <button type="submit" class="btn btn-primary" name="btnUpdate">Submit</button>
            <a type="submit" class="btn btn-primary" href="./index.php" name="btnUpdate">Back</a>
        </div>
    </div>
</form>