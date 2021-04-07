<?php
//memasukkan file config.php
include('config.php');
$msg = '';

if(isset($_POST['upload'])){
  $video = $_FILES['video']['name'];
  $path = 'video/'.$video;

  $sql = $koneksi->query("INSERT INTO video (video) VALUES ('$path')");

  if($sql){
    move_uploaded_file($_FILES['video']['tmp_name'],$path);
    $msg = 'Upload video Sukses!';

  }
  else{
    $msg = 'Upload video Gagal!';

  }
}
$result = $koneksi->query("SELECT video FROM video ");
?>
<!DOCTYPE html>
<html>
<head>
	<title>SAT RESKRIM POLRES BULELENG</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  
<style>
.table-responsive{
  height:400px; width:100%;
  overflow-y: auto;
  border:2px solid #444;
}.table-responsive:hover{border-color:red;}

table{width:100%;}
td{padding:24px; background:#eee;}
h1 {
	text-shadow: 2px 2px 4px #000;
}
h3 {
	text-shadow: 2px 2px 4px #000;
}
</style>

</head>
<body background="patung4.JPG">

<div class="container-fluid">
  <br>
  <br>
    <form method="post" action="tambah_video.php">
		<button type="submit" class="btn btn-warning  " >Tambah Video</button>
		</form>
    </div>
    
    <br>
  
		
		
    <div class="container-fluid">
    <div class="row justify-content-center mb-3">
    <div class="col-lg-10">
    <div id="demo" class="carousel slide" data-ride="carousel" data-interval="10000">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <?php
    $i = 0;
    foreach($result as $row){
      $actives = '';
      if($i == 0){
        $actives = 'active';
      }
    ?>
    <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
    <?php $i++; } ?>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
  <?php
    $i = 0;
    foreach($result as $row){
      $actives = '';
      if($i == 0){
        $actives = 'active';
      }
    ?>
    <div class="carousel-item <?= $actives; ?>">
    <video id="myvid" width="1000px" height="650px" controls autoplay>
  <source src="<?= $row['video']?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
      
    </div>
    <?php $i++; }?>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>


    </div>
    </div>
  </div>


    

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<p class="text-secondary"><span id="waktu">60</span></p>
<script type="text/javascript">

var video = document.getElementById('myvid');

video.addEventListener('ended',function(){
    location.href = 'index.php';
});

</script>
</body>
</html>
