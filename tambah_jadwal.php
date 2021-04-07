<?php include('config.php'); ?>
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
	<div class="container" style="margin-top:20px">
		<h2>Tambah Jadwal</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$id					= $_POST['id'];
			$laporan			= $_POST['laporan'];
			$perkara			= $_POST['perkara'];
			$saksi				= $_POST['saksi'];
			$penyidik			= $_POST['penyidik'];
			$unit				= $_POST['unit'];
			$jam				= $_POST['jam'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO jadwal(laporan, perkara, saksi, penyidik, unit, jam) VALUES('$laporan', '$perkara', '$saksi', '$penyidik', '$unit',  '$jam')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah_jadwal.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah_jadwal.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">LAPORAN POLISI</label>
				<div class="col-sm-10">
					<input type="text" name="laporan" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PERKARA</label>
				<div class="col-sm-10">
					<input type="text" name="perkara" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA SAKSI</label>
				<div class="col-sm-10">
					<input type="text" name="saksi" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PENYIDIK</label>
				<div class="col-sm-10">
					<input type="text" name="penyidik" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">UNIT</label>
				<div class="col-sm-10">
					<input type="text" name="unit" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JAM</label>
				<div class="col-sm-10">
				<input type="time" class="form-control" name="jam" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					
				</div>
			</div>
		</form>
		<form method="post" action="index.php">
					<button type="submit" class="btn btn-block btn-primary">Kembali</button>
		</form>
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