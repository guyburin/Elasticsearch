<?php

require_once 'app/ConnectDB.php';

if (isset($_GET['ES'])) {
  $ES = $_GET['ES'];
  $params = [
    'index' => 'ab_nyc_2019',
    'from' => 0,
    'size' => 10,
    'body'  => [
      'query' => [
        'match' => [
          'name' => $ES
        ]
      ]
    ]
  ];
  $response = $client->search($params);
  // print_r($response);

  // die();

  if ($response['hits']['total']['value'] >= 1) {
    $results = $response['hits']['hits'];
  } else {
    echo "<script>alert('ไม่มีที่พักชื่อนี้ กรุณาค้นหาใหม่')</script>";
  }
  // $ES = 0;
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Hotel.php">ที่พัก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="insert.php">เพิ่มข้อมูลที่พัก</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>อาจจะอยู่ไกล แต่ไม่หายไปไหนแน่นอน</h2>
            <span class="subheading">I may be far, but never gone.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <div class="post-preview">
          <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" autocomplete="off" action="index.php" method="GET">
            <i class="fas fa-search" aria-hidden="true"></i>
            <LAbel class="mr-sm-4"> ค้นหาที่พัก </LAbel>
            <input class="form-control mr-sm-4 col-md-8" name="ES" type="text" placeholder="Search" aria-label="Search" required>
            <button class="btn btn-outline-info btn-sm my-2 col-md-3" type="submit">ค้นหา</button>
          </form>
          <br>
        </div>
        <div class="post-preview">
          <table id="dtMaterialDesignExample" class="table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="th-sm">ชื่อที่พัก</th>
                <th class="th-sm">เมือง</th>
                <th class="th-sm">ย่าน</th>
                <th class="th-sm">ประเภทห้อง</th>
                <th class="th-sm">ราคา</th>
                <th class="th-sm">จำนวนคืนขั้นต่ำ</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($results)) {
                foreach ($results as $data) {
              ?>
                  <tr>
                    <th scope="row"><?php echo $data['_source']['name'] ?></th>
                    <td><?php echo $data['_source']['neighbourhood_group'] ?></td>
                    <td><?php echo $data['_source']['neighbourhood'] ?></td>
                    <td><?php echo $data['_source']['room_type'] ?></td>
                    <td>$ <?php echo $data['_source']['price'] ?></td>
                    <td><?php echo $data['_source']['minimum_nights'] ?></td>
                  </tr>

              <?php
                }
              }
              ?>
              <!-- <tr>
              <th scope="row">NYC Zen</th>
              <td>Manhattan</td>
              <td>East Village</td>
              <td>Entire home/apt</td>
              <td>3500  บาท</td>
              <td>3 คืน</td>
            </tr>
            <tr>
              <th scope="row">NYC space</th>
              <td>Washington Heights</td>
              <td>Manhattan</td>
              <td>Entire home/apt</td>
              <td>3000  บาท</td>
              <td>1 คืน</td>
            </tr>
            <tr>
              <th scope="row">Apartment NYC</th>
              <td>Long Island City</td>
              <td>Queens</td>
              <td>Entire home/apt</td>
              <td>3000  บาท</td>
              <td>5 คืน</td>
            </tr>
            <tr>
              <th scope="row">Heart of nyc. Harlem.</th>
              <td>Manhattan</td>
              <td>Harlem</td>
              <td>Entire home/apt</td>
              <td>2500  บาท</td>
              <td>1 คืน</td>
            </tr>
            <tr>
              <th scope="row">Instant NYC</th>
              <td>Manhattan</td>
              <td>Upper East Side</td>
              <td>Entire home/apt</td>
              <td>4800  บาท</td>
              <td>1 คืน</td>
            </tr> -->
            </tbody>
          </table>
        </div>


        <div class="post-preview">
        </div>
        <!-- <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div> -->

        <hr>

        <!-- Footer -->
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                  <li class="list-inline-item">
                    <a href="#">
                      <!-- <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span> -->
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="https://web.facebook.com/kuy.burin/">
                      <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="https://github.com/guyburin">
                      <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                  </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Mr.Burin Pancaht</p>
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