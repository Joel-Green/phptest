<?php include('server.php');
  $db = mysqli_connect('localhost', 'root', '', 'testphp');
  $query = "SELECT id, heading, text1, file FROM dynamic ORDER BY id";
  $resultObj = $db->query($query);
  $db->close();
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dynamic Image and Text</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>


 <div class="container">
   <div class="jumbotron">
     <h2>Dynamic Text And Image</h2>
   </div>
   
    <?php while($row = $resultObj->fetch_assoc()): ?>
      <div class="row">
      <div class="col-md-8">
        <h4><?=$row['heading']?></h4>
        <?=$row['text1']?>
      </div>
      <div class="col-md-3"> 
        <?php echo "<img src=".$row['file']." class='img-fluid'  alt='image not found' />"?>
      </div>
      <div class="col-md-1">
        <form action="index.php" method="post">
          <input type="hidden" name="id" value="<?=$row['id']?>">
          <button type="submit" name="deldata" class="btn btn-danger ">Delete  </button>
        </form>
      </div>
      </div><br>
      <?php endWhile; ?>
    
    <br>    
    <div class="row">
    
    <button type="button" class="btn btn-primary text-center btn-block" data-toggle="modal" data-target="#exampleModal">
      +
    </button>

    </div>
    <br>
   <div class="row">
     <div class="col-12">  <a href="user.php">Check User point of veiw </a></div>
   </div>
    
    
    <!-- Modal -->
    <form method="post" action="index.php" enctype="multipart/form-data">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php include('errors.php'); ?>
              <div class="form-group">
                <label>Heading:</label>
                <input type="text" name="heading" class="form-control" >
              </div>
              <div class="form-group">
              <label>Text:</label>
                <textarea name="text1" cols="50" rows="4"  class="form-control" ></textarea>
              </div>
              <div class="form-group">
                <label>Select Image:</label>
                <input type="file" name="file" class="form-control-file""><br/>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="input_image">Add</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>