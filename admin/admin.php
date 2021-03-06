<?php
session_start();
include("../include/connection.php");

if(isset($_POST['send'])) {

  $name = $_POST['name'];
  $msg = $_POST['msg'];
  $date = date('y-m-d h:i:s');

  $sql = "INSERT INTO inf (name, message, cr_date) VALUES ('$name', '$msg', '$date')";
  $result = $mysqli->query($sql);

  if($result) {
      echo "<script>alert('Success annoucement!');</script>";
  }
}

?>

<!-- HTML FILE  -->
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    <?php include "admin.css" ?>
</style>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<body>  

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Tuah.</h3>
        </h3>
      </div>

      <ul class="list-unstyled components">
        <p class="user">Admin</p>

        <li>
          <a href="#main">Dashboard</a>
        </li>
        <li>
          <a href="">Annoucement</a>
        </li>
        <li>
          <a href="../logout.php">Logout</a>
        </li>


      </ul>


    </nav>

    <!-- Page Content Holder -->
    <div id="content">

      <nav class="navbar navbar-default">
        <div class="container-fluid">

          <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Sidebar</span>
                            </button>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Page</a></li>
            </ul>
          </div>
        </div>
      </nav>

        <!-- Body  -->

        <!-- MAIN Dashboard: MESSAGE ANNOUCEMENT  -->
        <div class="container bg-dark" id="center">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-white">Name</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="text-white">Enter Message</label>
                                <input type="text" class="form-control" name="msg"  id="exampleInputPassword1" placeholder="Enter Message">
                            </div>
                            <button type="submit" name="send" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
        </div>

      

 


  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <!-- Bootstrap Js CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  <script type="text/javascript">


    $(document).ready(function() {


      $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>