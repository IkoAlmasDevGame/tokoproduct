<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Admin Login</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrapv5221.css" type="text/css">
    <link rel="stylesheet" href="../../bootstrap/css/text-bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../bootstrap/css/glyphicon.css" type="text/css">
    <link rel="icon" href="" type="">
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style type="text/css">
        #layoutAuthentication {
            margin: 0px 0px 0px 0px;
        }
        #layoutAuthentication_content {
            padding: 0px 0px 0px 0px;
        }
        body {
            background-image: linear-gradient(120deg, rgba(127, 80, 177, 0.22), rgba(121, 100, 144, 0.5));
        }
        .form-group{
            width: 100%;
        }
        .kotak {
            margin-top: 150px;
        }
        .kotak .input-group {
            margin-bottom: 20px;
        }
    </style>
</head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-fluid">
                        <?php 
                            if(isset($_GET["pesan"])){
                                if($_GET["pesan"] == "keluar"){
                                    echo "<div class='mb-4 text-center text-medium'>Anda telah Logout<div>";
                                }else if($_GET["pesan"] == "gagal"){
                                    echo "<div class='mb-4 text-center text-medium'>Anda gagal, coba lagi beberapa waktu ...<div>";
                                }else if($_GET["pesan"] == "kosong"){
                                    echo "<div class='mb-4 text-center text-medium'>Anda telah kosongkan user dan password, harap di isi kembali ...<div>";
                                }
                                echo "<script>window.setTimeout(() => {window.location.href='index.php'}, 5000);</script>";
                            }
                        ?>
                    </div>
                    <div class="kotak">
                        <form action="../action/act_login.php" method="post" class="form-group">
                            <div class="panel panel-default col-md-3 col-md-offset-4">
                                <div class="text-center">
                                    <h3 class="text-small-3 mb-5">Silahkan Login</h3>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="email" name="userEmail" class="form-control input" placeholder="masukkan email anda ..." autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" name="password" class="form-control input" placeholder="masukkan password anda ..." autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <div class="modal-footer">
                                        <button type="submit" name="login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Log In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>