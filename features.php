<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSV</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon"> -->
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">CSV</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="files.php">Data Files</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="features.php">Tax Details</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li> -->
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </nav>
<div class="jumbotron text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header text-center">
            <h3 class="card-title">Tax Info...!</h3>
          </div>
          <div class="card-body">
          <?php
            $con1 = mysqli_connect("localhost", "root", "", "csv");
            $table1  = mysqli_query($con1 ,"SELECT sum(pre_tax_amount) FROM csv_file");
            while($row1 = mysqli_fetch_array($table1)){ ?>
              <div class="span">
                <div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total Pre-Tax Amount :&nbsp;<?php echo $row1["sum(pre_tax_amount)"]; ?></div>
              </div>
          <?php } ?>
          <?php
            $con2 = mysqli_connect("localhost", "root", "", "csv");
            $table2  = mysqli_query($con2 ,"SELECT avg(pre_tax_amount) FROM csv_file");
            while($row2  = mysqli_fetch_array($table2)){ ?>
              <div class="span">
                <div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Average of Pre-Tax Amount :&nbsp;<?php echo $row2["avg(pre_tax_amount)"]; ?></div>
              </div>
          <?php } ?>
          <?php
            $con3 = mysqli_connect("localhost", "root", "", "csv");
            $table3  = mysqli_query($con3 ,"SELECT max(pre_tax_amount) AS max FROM csv_file");
            while($row3  = mysqli_fetch_array($table3)){ ?>
              <div class="span">
                <div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Maximum of Pre-Tax Amount :&nbsp;<?php echo $row3['max']; ?></div>
              </div>
          <?php } ?>
          </div>
          <div class="card-footer">
            
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header text-center">
            <h3 class="card-title">Average Tax...!</h3>
          </div>
          <div class="card-body">
            <?php
              $con1 = mysqli_connect("localhost", "root", "", "csv");
              $table1  = mysqli_query($con1 ,"SELECT sum(tax_amount) FROM csv_file");
              while($row1 = mysqli_fetch_array($table1)){ ?>
                <div class="span">
                  <div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total Pre-Tax Amount :&nbsp;<?php echo $row1["sum(tax_amount)"]; ?></div>
                </div>
            <?php } ?>
            <?php
              $con2 = mysqli_connect("localhost", "root", "", "csv");
              $table2  = mysqli_query($con2 ,"SELECT avg(tax_amount) FROM csv_file");
              while($row2  = mysqli_fetch_array($table2)){ ?>
                <div class="span">
                  <div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Average of Pre-Tax Amount :&nbsp;<?php echo $row2["avg(tax_amount)"]; ?></div>
                </div>
            <?php } ?>
            <?php
              $con3 = mysqli_connect("localhost", "root", "", "csv");
              $table3  = mysqli_query($con3 ,"SELECT max(tax_amount) AS max FROM csv_file");
              while($row3  = mysqli_fetch_array($table3)){ ?>
                <div class="span">
                  <div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Maximum of Pre-Tax Amount :&nbsp;<?php echo $row3['max']; ?></div>
                </div>
            <?php } ?>
          </div>
          <div class="card-footer">
            
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-left: 20%; margin-right: 20%; margin-top: 10px;">
      <div class="col-12">
        <div class="card">
          <div class="card-header text-center">
            <h3 class="card-title">Highest Tax...!</h3>
          </div>
          <div class="card-body">

          </div>
          <div class="card-footer">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>