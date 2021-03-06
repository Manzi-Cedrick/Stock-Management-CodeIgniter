<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
body{
    background: rgba(0, 0, 0, 0.13);
}
.Container{
    background: white;
    border-radius: 4px;
    padding: 2em;
    margin: 4em auto;
    width: 25vw;
    overflow-y: auto;
}
label{
    display: block;
    padding: 15px 0px;
    color: royalblue;
}
input[type="text"],input[type="number"],input[type="file"]{
    width: 100%;
    height: 60px;
    background-color: white;
    border: 1px solid black;
    padding-left: 15px;
    font-size: 1.1em;
}
input[type="text"]:focus,input[type="number"]:focus,input[type="file"]:focus{
    outline: auto;
    outline-color: royalblue;
    box-shadow: 2px 2px 5px 0px royalblue;
}
.add-btn{
    padding: 1em 3em;
    margin: 2em 0;
    background: blueviolet;
    color: white;
    border: none;
    outline: none;
    float: right;
}
.cancel-btn{
    padding: 1em 3em;
    margin: 2em 0;
    background: red;
    color: white;
    border: none;
    outline: none;
    float: left;
}
</style>
<body>
    <div class="Container">
        <div>
            <h1>Add Product</h1>
        </div>
        <form action="<?= base_url().'index.php/Products/updateProduct/'.$registered_details[0]['productId'] ?>" method="post">
            <label>Product Name</label>
            <input type="text" name="productName" placeholder="Add Product Name" value="<?= $registered_details[0]['product_Name'] ?>">
            <label>Brand</label>
            <input type="text" name="brand" placeholder="Add Brand" value="<?= $registered_details[0]['brand'] ?>">
            <label>Supplier</label>
            <input type="text" name="supplier" placeholder="Add Supplier" value="<?= $registered_details[0]['supplier'] ?>">
            <label>Supplier Tel:</label>
            <input type="number" name="supplier_phone" placeholder="Add tel" value="<?= $registered_details[0]['supplier_phone'] ?>">
            <button class="btn add-btn" type="submit">Update</button>
            <button class="btn cancel-btn">Cancel</button>
        </form>
    </div>
</body>
</html>