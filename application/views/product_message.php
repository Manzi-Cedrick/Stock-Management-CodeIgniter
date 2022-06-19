<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="./addCart.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label>Product Name</label><input type="text" placeholder="Product Name" name="productName" required>
            <label>Product Brand</label><input type="text" placeholder="Price" name="brand" required>
            <label>Product Image</label><input type="text" placeholder="New Supplier" name="supplier" required>
            <label>Product Image</label><input type="number" placeholder="New Suppplier Phone" name="supplier_phone" required>
            <input type="submit" value="Login" name="submit">
        </form>
    </div>
</body>
</html>