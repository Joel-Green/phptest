<?php 
  $db = mysqli_connect('localhost', 'root', '', 'testphp');
  $query = "SELECT id, heading, text1, file FROM dynamic ORDER BY id";
  $resultObj = $db->query($query);

?>
<html>
<head>
  <title>Dynamic users veiw</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>

  
   <div class="container">
     <div class="jumbotron"><h2>HomePage</h2></div>
   
 
  <?php while($row = $resultObj->fetch_assoc()): ?>
      <div class="row">
      <div class="col-md-8">
        <h4><?=$row['heading']?></h4>
        <?=$row['text1']?></div>
      <div class="col-md-4"> 
        <?php echo "<img src=".$row['file']." class='img-fluid'  alt='image not found' />"?>
      </div>
      </div><br>
      <?php endWhile; ?>

</div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
</body>
</html>