<?php
include '../config/db.php';
$page     = 0;
$per_page = 3;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/theme.css" type="text/css">
  <title>Home</title>
</head>

<body>
  <?php
  include"includes/header.php";
  if(isset($_GET["page"]))
  {
    $page=$_GET["page"];
    $page = ($per_page*$page);
  }
  ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <h1>Recent Songs</h1>
      </div>
        <?php
        $result     = mysqli_query($con,"select id from songs");
        $total_rows = mysqli_num_rows($result);
        $pages      = ceil($total_rows/$per_page);

        $query      = mysqli_query($con,"select id,title,file from songs order by id desc limit $per_page offset $page");
        while($row = mysqli_fetch_object($query)){  
        ?>
          <div class="row">  
            <div class="col-md-3">
              <audio src="../admin/uploads/<?=$row->file?>" controls></audio><br>
              <span style="font-weight:bold;margin:0 0 0 70px"><?=$row->title?></span>
            </div>
          </div>
        <?php  
        } 
      ?>  

    </div>
    <?php
    include"includes/pagination.php";
    ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>