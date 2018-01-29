<?php
include 'config/config.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>POS RM Padang</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <section id="loginsection">
            <div class="row">

                <!-- Form Kategori-->
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Login
                        </div>
                        <?php
                        if ($_POST['btlogin']) {
                            $user = $_POST['username'];
                            $pass = md5($_POST['password']);
                            $level = $_POST['level'];
                            $sql->query("select count(id_user) as jumlah, id_user, username from user where username='" . $user . "' and password='" . $pass . "' and level='" . $level . "' ");
                            while ($data = $sql->getData()) {
                                if ($data->jumlah == 0) {
                                    echo "<script>alert('Username atau Password salah!');</script>";
                                    echo"<script>document.location.href='login.php';</script>";
                                } else {
                                    session_start();
                                    $_SESSION['id_user'] = $data->id_user;
                                    $_SESSION['username'] = $data->username;
                                    $_SESSION['level'] = $data->level;
                                    echo"<script>document.location.href='kategori.php';</script>";
                                }
                            }
                        }
                        ?>
                        <div class="panel-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="sebagai">Login Sebagai</label>
                                    <select class="form-control" id="sebagai" name="level">
                                        <option>Admin</option>
                                        <option>User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning" id="login" name="btlogin" onclick="frmlogin()" value="Login" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </section>



        <script src="assets/plugins/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap/bootstrap.js" type="text/javascript"></script> 
        <script src="assets/plugins/dataTables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="assets/plugins/dataTables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#datatabel').dataTable();
                                        });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tabelmentah').dataTable();
            });
        </script>
        <script type="text/javascript">
            function frmlogin() {
                if (document.getElementById('sebagai').value == "Admin Dapur") {
                    window.location.href = "index.html";
                } else if (document.getElementById('sebagai').value == "Kasir") {
                    window.location.href = "kasir.html";
                } else {
                    alert("Durung cak");
                }
            }
        </script>
    </body>
</html>
