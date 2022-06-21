<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    background: #0B1570;
}
:root{
    --button-colors:#0B1570;
}
.sign-in{
    background-color: #F0F3FC;
    width: 55vh;
    margin: auto;
    margin-top:0.0em;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
    padding: 2em 2em;
}
.toggle{
    padding: 0.2em 0;
    width: 55vh;
    margin-top: 5em;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}
.Page-Container{
    width: 55vh;
    height: 85vh;
    margin: auto;
    /* background: #000; */
}
#header{
    font-size: 2em;
    color: black;
    font-weight: bold;
    font-family: var(--font-families);
}
label{
    display: block;
    padding: 10px 0px;
    opacity: 0.5;
    color: black;
    text-transform: capitalize;
}

input[type='submit']{
    background-color: #0B1570;
    color: white;
    text-align: center;
    font-size: 1.1em;
    outline: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 5%;
    position: relative;
    padding: 15px;
    width: 100%;
}
.submit-btn{
    background-color: #000;
    color: white;
    text-align: center;
    font-size: 1.1em;
    outline: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 5%;
    position: relative;
    padding: 15px;
    width: 100%;
}
.sign-in-register{
    width: 100%;
    height: 70px;
    padding-left: 10px;
    margin-top: 2%;
    text-align: center;
    color: black;
    padding-top: 6%;
}
.checks{
    width: 100%;
    height: 40px;
    margin-top:5%;
    font-size: 1em;
}
input[type='checkbox']{
    height: 18px;
    width: 18px;
}
.form-groups{
    display: flex;
    gap: 0 4em;
}
#forgot{
    color: blue;
    float: right;
}
input[type='text'],input[type='password'],input[type='email'],input[type='number'],input[type='file']{
    width: 100%;
    height: 50px;
    padding-left: 10px;
}
input[type='radio']{
    width: 80px;
    height: 20px;
}
.sign-up{
    background-color: #F0F3FC;
    width: 55vh;
    margin:4em auto;
    padding: 1em 2em;
}
.css-animate{
    color: white;
}
.eye{
    float: right;
    transform: translate(-5px,-35px)
}
.spinner {
   width: 12px;
   height: 12px;
   display: block;
   position: absolute;
   left: 50%;
   margin-top: 10%;
   z-index: 12;
   border: 11.2px white double;
   border-left-style: solid;
   border-radius: 50%;
   animation: spinner-aib1d7 0.75s infinite linear;
}

@keyframes spinner-aib1d7 {
   to {
      transform: rotate(360deg);
   }
}
.see{
    float: right;
    color: hotpink;
    transform: translate(-5px,-30px);
}
.first-inputs{
    width: 55vh;
}
a{
    text-decoration: none;
    color: white;
}
    </style>
</head>
<body>
    <?php 
    $this->session->sess_destroy();
    ?>
<div class="sign-up">
    <span id="header">Login</span>
    <div class="form">
        <form action="<?= base_url('user/loginUser')?>" method="post">
            <label>Email Address</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            <small><?= form_error('email') ?></small>
            <label>Password</label>
            <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="password">
            <small><?= form_error('password') ?></small>
            <div>
            <input  type="submit" value="Login"/>
            <button class="submit-btn"><a href="<?= base_url('user/signup')?>">Sign Up</a></button>
            </div>
        </form>
    </div>
</div>
</body>
</html>