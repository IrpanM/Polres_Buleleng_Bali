<?php include('config.php'); 
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="libraries/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body class="bg-secondary">

	<div class="container" style="margin-top:20px">
	<img src="Polda_Bali.png" class="float-left" width="150px" height="150px">
	<img src="bareskrim.png" class="float-right" width="150px" height="150px">
		<h2 class="text-center text-warning font-weight-bold">SELAMAT DATANG <br> DI SAT RESKRIM POLRES BULELENG</h2>
		<h4 class="text-center text-warning">JADWAL PANGGILAN PEMERIKSAAN KLARIFIKASI <br> DI SAT RESKRIM POLRES BULELENG</h4>
	
		<hr>
		<div class="row justify-content-center">
    <div class="col-lg-4 bg-dark rounded px-4">
    <h4 class="text-center text-light p-1">Pilih Video untuk di Upload</h4>
    <form action="video.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <input type="file" name="video" class="form-control p-1" required>
    </div>
    <div class="form-group">
    <input type="submit" name="upload" class="btn btn-warning btn-block" value="Upload video" required>
    </div> 
    <div class="form-group">
    <h5 class="text-center text-light"><?= $msg; ?></h5>
    </div>
    </form>
    </div>
    </div>
    </div>

<br>
<br>
    <div class="container">
    <form method="post" action="video.php">
					<button type="submit" class="btn btn-primary">Kembali</button>
		</form>
    <br>
  <table class="table table-striped table-primary table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>NO.</th>
					<th>Foto</th>
          <th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM video ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td> <video width="200px" height="100px" controls>
              <source src='.$data['video'].' type="video/mp4">
              Your browser does not support the video tag.
            </video></td>
							<td>
								<a href="delete_video.php?id='.$data['id'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
</div>
	
    <!-- Include library Moment JS -->
    <script src="datepicker/libraries/moment/moment.min.js"></script>
    <!-- Include library Datepicker Gijgo -->
    <script src="datepicker/libraries/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Include file custom.js -->
    <script src="datepicker/js/custom.js"></script>
    <script>
    $(document).ready(function(){
        setDatePicker()
        setDateRangePicker(".startdate", ".enddate")
        setMonthPicker()
        setYearPicker()
        setYearRangePicker(".startyear", ".endyear")
    })
    </script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>