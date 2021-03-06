<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./dashboard.css" />
    <script src="https://kit.fontawesome.com/db1fd6b42b.js" crossorigin="anonymous"></script> <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
body {
    background: rgb(241, 241, 241);
}
.whole{
    display: flex;
}
.Navbar-header{
    background: white;
    display: flex;
    justify-content: space-between;
    height: 10vh;
}
.Navbar-header header ul {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    list-style: none;
}
ul li a{
    padding: 1.5em;
    gap: 0 0.5em;
    text-decoration: none;
    display: flex;
    color: black;
}
ul li a i{
    font-size:1.1em;
}
li:hover{
    border-bottom: 4px solid rgb(100, 239, 100);
}
.Appnav{
    background: white;
    display: flex;
    justify-content: center;
}
.SideBar{
    height: 90vh;
    width: 20vw;
    background: rgb(21, 2, 103);
    outline: 1px solid rgba(0, 0, 0, 0.064);
    padding:0 10px;
    color: white;
}
.LogoContainer{
    padding:20px 0;
}
.LogoContainer h2{
    color: white;
    font-size: 2em;
    padding-left: 1em;
}
.Order{
    padding: 2em;
    margin: 1em 0;
    border-radius: 12px;
    color:white;
    display: flex;
    justify-content: center;
    flex-direction: column;
    /* place-items: center; */
}
.Order p{
    font-size: 1em;
    font-weight: 500;
}
.Order span{
    color: rgba(255, 255, 255, 0.774);
    font-size: 1em;
}
.Order:hover{
    /* background-color: rgba(137, 43, 226, 0.035); */
    cursor: pointer;
    outline: 1px solid white;
}
.active{
    background-color: rgba(137, 43, 226, 0.035);
    color: blueviolet;
    cursor: pointer;
    outline: 1px solid rgba(0, 0, 0, 0.164);
}
.navBar{
    background: white;
    /* width: 75vw; */
    height: 10vh;
    outline: 1px solid rgba(0, 0, 0, 0.064);
}
.nav{
    display: flex;
    justify-content: space-between;
    padding: 15px 2em;
}
.body-all{
    display: block;
    width: 100%;
    /* background: red; */
    height: 90vh;
}
.search-input{
    padding: 1em 2em;
    width: 20vw;
    border-radius: 12px;
    color: rgba(0, 0, 0, 0.624);
    background-color: rgba(137, 43, 226, 0.035);
    outline: 1px solid rgba(0, 0, 0, 0.064);
    border: none;
}
.user{
    padding: 0 2em;
    display: flex;
    justify-content: space-between;
    gap: 15px;
}
.user i{
    padding:1em;
    border-radius:50%;
}
.user i:hover{
    cursor: pointer;
    background-color: rgba(213, 206, 206, 0.244);
}
.user img{
    width: 50px;
    height:50px;
    border-radius: 50%;
}
.user-all{
    padding: 0 2em;
}
.users-now{
    padding: 1em 0;
    color: black;
    font-weight: bolder;
    display: flex;
    justify-content: space-between;
}
.users-now button{
    padding: 1em 2em;
    color: white;
    background: blueviolet;
    border: none;
    outline: none;
    border-radius:5px;
}
.users-now a{
    color: white;
}
.table-wrapper{
    background: white;
    margin: 0 auto;
 }
.td-active{
    background: rgba(149, 243, 149, 0.1);
    padding: 1em;
    color: green;
    border-radius: 12px;
    font-weight: bold;
}
.td-status{
    background: rgba(240, 53, 16, 0.037);
    padding: 1em;
    color: red;
    border-radius: 12px;
    font-weight: bold;
}
.td-pending{
    background: rgba(255, 255, 0, 0.19);
    padding: 1em;
    color: rgb(255, 196, 0);
    border-radius: 12px;
    font-weight: bold;
}
.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
}
.fl-table td, .fl-table th {
    text-align: left;
    padding: 1.5em 2em;
}
.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}
.fl-table thead th {
    color: black;
    padding: 1.5em 2em;
}

.fl-table thead th i{
    padding-left: 6.5em;
    color: rgba(0, 0, 0, 0.217);
}
.users-sort {
    background: white;
    padding: 1em 0.5em;
    color: rgba(0, 0, 0, 0.595);
    font-weight: bolder;
    display: flex;
    justify-content: space-between;
}
.fl-table thead th:nth-child(odd) {
    color: black;
}
#select{
    padding: 0.7em;
    border-radius: 12px;
    border: none;
}
a{
    /* color: red; */
    text-decoration: none;
}
/* Responsive */
.btn-products{
    display: flex;
    gap: 0 1em;
}
@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
        
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: left;
    }
}

@media (max-width:480px) {
    .heading{
        font-size:10px;
        font-weight:bold;
        margin-top:10px;

    }
    .desi{
        font-size:16px;
        margin-left: 0px;
    }
    .sach{
        margin-top:5px;
        margin-right:60px;
    }
    .bell{
        margin-top: 5px;
    }

    .sidee{
        display:none;
    }
    .roundd img{
        width: 27px;
        height: 27px;
    }
    .table-wrapper table thead tr th{
        font-size:10px;
        width: 11em;
    }
    .table-wrapper table tbody tr td{
        font-size:8px;
        width: 11em;
        
    }
    .submit-btn{
        font-size: 5px;
    }
}
    </style>
</head>
<body>
    <div class="App">
        <div class="Navbar-header">
            <header>
            <ul>
                    <li><a href="<?php echo base_url()?>"><i class="fa-solid fa-users"></i><span>Users</span></a></li>
                    <li><a href="<?php echo base_url('products')?>"><i class="fa-solid fa-cart-plus"></i><span>Products</span></a></li>
                    <li><a href="<?php echo base_url('stock')?>"><i class="fa-solid fa-clipboard"></i><span>Inventory</span></a></li>
                    <li><a href="<?php echo base_url('outgoing')?>"><i class="fa-solid fa-outdent"></i><span>Outgoing</span></a></li>
                </ul>
            </header>
            <div class="Appnav">
                <div class="nav">
                    <div class="user">
                        <i class="fa-solid fa-search"></i>
                        <i class="fa-solid fa-bell"></i>
                        <img src="../giraffeee.jpg" alt="" class="doctor" />
                        <span>Paul</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="whole">
        <div class="SideBar">
            <div class="LogoContainer">
                <h2>Stock Management</h2>
            </div>
            <a href="<?= base_url('products');?>"><div class="Order">
                <p>Products</p>
                <span></span>
            </div></a>
            <a href="<?= base_url('stock');?>"><div class="Order">
                <p>Inventory</p>
                <span></span>
            </div></a>
            <a href="<?= base_url('outgoing');?>"><div class="Order">
                <p>Outgoing</p>
                <span><?= count($outgoing) ?></span>
            </div></a>
           <a href="<?= base_url()?>"><div class="Order">
                <p>Stock Admins</p>
                <span></span>
            </div></a>
        </div>
        <div class="body-all">
            <div class="user-all">
                <div class="users-now">
                    <span>Outgoing</span>
                    <div class="btn-products">
                    <button><a href="<?php echo base_url('outgoing/new');?>"><i class="fa-solid fa-plus" style="padding: 0 0.5em;"></i> Add to OutGoing </a></button>
                    <button><a href="<?php echo base_url('outgoing/report');?>">Print Report</a></button>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                            <tr className="heads">
                                <th>Quantity</th>
                                <th>ProductID</th>
                                <th colSpan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             foreach ($outgoing as $value){?>
                            <tr>
                                <td><?= $value['quantity'];?></td>
                                <td><?= $value['productId'];?></td>
                                <td><a href="<?php echo base_url('outgoing/delete/').$value['outgoingId'];?>"><i class="fa-solid fa-trash"></i></a></td>
                                <td><a href="<?php echo base_url('outgoing/editoutgoing/').$value['outgoingId'];?>"><i class="fa-solid fa-pencil"></i></a></td>
                            </tr>
                            <?php 
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
                        <script type='text/javascript'>
                $(document).ready(function() {
                    $('table').DataTable();
                });</script>
   
</body>

</html>