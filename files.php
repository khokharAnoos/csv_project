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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
        <li class="nav-item active">
          <a class="nav-link" href="files.php">Data Files</a>
        </li>
        <li class="nav-item">
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
  <div class="container">
    <div class="row">
      <div class="card">
            <div class="card-header text-center">
              <h3 class="card-title">Tax Data Table...!</h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <!-- <div class="form-group">
                <?php// echo $users ?>
              </div> -->
              <div class="form-group">
                <button onclick="Export()" class="btn btn-primary">Download CSV File</button>
              </div>
              <!--  /Content   -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Category</th>
                  <th>Lot Title</th>
                  <th>Lot Location</th>
                  <th>Lot Condition</th>
                  <th>Pre-Tax Amount</th>
                  <th>Tax Name</th>
                  <th>Tax Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php
                $con = mysqli_connect("localhost", "root", "", "csv");
                $table  = mysqli_query($con ,'SELECT * FROM csv_file');
                while($row  = mysqli_fetch_array($table)){ ?>
                <tr id="<?php echo $row['id']; ?>">
                  <td><?php echo $row['date'];?></td>
                  <td><?php echo $row['category'];?></td>
                  <td><?php echo $row['lot_title'];?></td>
                  <td><?php echo $row['lot_location'];?></td>
                  <td><?php echo $row['lot_condition'];?></td>
                  <td><?php echo $row['pre_tax_amount'];?></td>
                  <td><?php echo $row['tax_name'];?></td>
                  <td><?php echo $row['tax_amount'];?></td>
                  <td><button type="button" class="btn btn-primary" onclick="showmodel(<?php echo $row['id']; ?>);" >Update</button></td>
                </tr>

                <?php
                $sid=$row['id'];
                  $query = "SELECT * FROM csv_file WHERE id='$sid' " ;

                  $result = mysqli_query($con, $query);
                  while($strow = mysqli_fetch_array($result)){
                ?>
                <!-- Modal -->
                <div id="myModal<?php echo $sid ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <form method="POST" action="files.php" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Date</font></label>
                            <input type="text" name="date" class="form-control" value="<?php echo $strow['date'];?>">

                            <label>Category</label>
                            <input type="text" name="category" class="form-control" value="<?php echo $strow['category'];?>">

                            <label>Lot Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $strow['lot_title'];?>">

                            <label>Lot Location</label>
                            <input type="text" class="form-control" name="location" value="<?php echo $strow['lot_location'];?>">

                            <label>Lot Condition</label>
                            <input type="text" class="form-control" name="condition" value="<?php echo $strow['lot_condition'];?>">

                            <label>Pre-Tax Amount</label>
                            <input type="text" class="form-control" name="pre_tax" value="<?php echo $strow['pre_tax_amount'];?>">

                            <label>Tax name</label>
                            <input type="text" class="form-control" name="tax_name" value="<?php echo $strow['tax_name'];?>">

                            <label>Tax Amount</label>
                            <input type="text" class="form-control" name="tax_amount" value="<?php echo $strow['tax_amount'];?>">

                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                            <input type="submit" name="update" value="Save" class="btn btn-primary">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </form>
                      <?php  ?>
                    </div>
                  </div>
                </div>
              
            <?php } } ?>
          </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Category</th>
                  <th>Lot Title</th>
                  <th>Lot Location</th>
                  <th>Lot Condition</th>
                  <th>Pre-Tax Amount</th>
                  <th>Tax Name</th>
                  <th>Tax Amount</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
  </div>

</body>

<script>
function showmodel(id){
  
  $('#myModal'+id).modal('toggle');
}
</script>
<script>
  function Export()
  {
    var conf = confirm("Export users to CSV?");
    if(conf == true)
    {
      window.open("export.php", '_blank');
    }
  }
</script>
</html>
<?php
$con = mysqli_connect("localhost", "root", "", "csv");
if(isset($_POST['update'])){
  
  $date = mysqli_real_escape_string($con, $_POST['date']);
  $category = mysqli_real_escape_string($con, $_POST['category']);
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $location = mysqli_real_escape_string($con, $_POST['location']);
  $condition = mysqli_real_escape_string($con, $_POST['condition']);
  $pre_tax = mysqli_real_escape_string($con, $_POST['pre_tax']);
  $tax_name = mysqli_real_escape_string($con, $_POST['tax_name']);
  $tax_amount = mysqli_real_escape_string($con, $_POST['tax_amount']);
  $id = mysqli_real_escape_string($con, $_POST['id']);

  //  query to update data 
   
  $result  = mysqli_query($con , "UPDATE csv_file SET date='$date' , category='$category' , lot_title='$title' , lot_location = '$location', lot_condition = '$condition', pre_tax_amount = '$pre_tax', tax_name = '$tax_name', tax_amount = '$tax_amount' WHERE id='$id'");
  if ($result){
    echo '<script type="text/javascript">alert("You have Successfully Done Your Job...!"); window.location = "files.php";</script>';
  }else{
    echo '<script type="text/javascript">alert("Something Went Wrong. You are not ALLOWED...!");</script>';
  }

}
?>