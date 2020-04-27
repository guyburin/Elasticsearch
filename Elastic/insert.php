<?php
require_once 'app/ConnectDB.php';

if (!empty($_POST)) {
  if (isset($_POST['name'], $_POST['neighbourhood_group'], $_POST['neighbourhood'], $_POST['room_type'], $_POST['price'], $_POST['minimum_nights'])) {
    $name = $_POST['name'];
    $neighbourhood_group = $_POST['neighbourhood_group'];
    $neighbourhood = $_POST['neighbourhood'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $minimum_nights = $_POST['minimum_nights'];
    // print($name);

    $indexed = $client->index([
      'index' => 'ab_nyc_2019',
      'type' => '_doc',
      'body' => [
        'name' => $name,
        'neighbourhood_group' => $neighbourhood_group,
        'neighbourhood' => $neighbourhood,
        'room_type' => $room_type,
        'price' => $price,
        'minimum_nights' => $minimum_nights
      ]
    ]);

    if($indexed){
      // print_r($indexed);
      echo "<script>alert('บันทึกเสร็จสิ้น')</script>";
    }else{
      echo "<script>alert('ไม่สามารถบันทึกได้ กรุณาลองใหม่')</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <img src="https://img.icons8.com/color/48/000000/worldwide-location.png" />
      <a class="navbar-brand" href="index.html">ค้นหาสถานที่พักใน NewYork City</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">หน้าแรก</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Hotel.php">ที่พัก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="insert.php">เพิ่มข้อมูลที่พัก</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Man must explore, and this is exploration at its greatest</h1>
            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
            <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on August 24, 2019</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 mx-auto">
          <form method="POST" action="insert.php">
            <div class="form-group">
              <label for="exampleInputEmail1">ชื่อที่พัก</label>
              <input type="text" class="form-control col-md-10" name="name" aria-describedby="emailHelp" placeholder="Hotel , apartment , house">
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputPassword1">เมือง</label>
                  <input type="text" class="form-control col-md-12" name="neighbourhood_group" placeholder="Brooklyn">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputPassword1">ย่าน</label>
                  <input type="text" class="form-control col-md-12" name="neighbourhood" placeholder="Kensington">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">ประเภทห้อง</label>
              <input type="text" class="form-control col-md-10" name="room_type" placeholder="Private room,Entire home/apt">
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputPassword1">ราคา</label>
                  <input type="text" class="form-control col-md-12" name="price" placeholder="Password">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputPassword1">จำนวนคืนขั้นต่ำ</label>
                  <input type="text" class="form-control col-md-12" name="minimum_nights" placeholder="Password">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </article>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>