<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>SAT RESKRIM POLRES BULELENG</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script>
			$(document).ready(function(){
				window.setInterval(function () {
					var sisawaktu = $("#waktu").html();
					sisawaktu = eval(sisawaktu);
					if (sisawaktu == 0) {
						location.href = "foto.php";
					} else {
						$("#waktu").html(sisawaktu - 1);
					}
				}, 1000);
			});
		</script>
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
h4 {
	text-shadow: 2px 2px 4px #000;
}
</style>

</head>
<body background="patung4.JPG">

	<div class="container" style="margin-top:40px">
	<img src="Polda_Bali.png" class="float-left" width="150px" height="150px">
	<img src="bareskrim.png" class="float-right" width="150px" height="150px">
		<h1 class="text-center text-warning font-weight-bold">SELAMAT DATANG <br font face="Courier New"> DI SAT RESKRIM POLRES BULELENG</h1>
		<h3 class="text-center text-warning font-weight-bold">JADWAL PANGGILAN PEMERIKSAAN / <br> KLARIFIKASI DI SAT RESKRIM POLRES BULELENG</h3>
		<?php
		date_default_timezone_set('Asia/Jakarta');
function TanggalIndonesia($date) {
	
    $date = date('Y-m-d',strtotime($date));
    if($date == '0000-00-00')
        return 'Tanggal Kosong';
 
    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);
 
    switch ($bln) {
        case 1 : {
                $bln = 'Januari';
            }break;
        case 2 : {
                $bln = 'Februari';
            }break;
        case 3 : {
                $bln = 'Maret';
            }break;
        case 4 : {
                $bln = 'April';
            }break;
        case 5 : {
                $bln = 'Mei';
            }break;
        case 6 : {
                $bln = "Juni";
            }break;
        case 7 : {
                $bln = 'Juli';
            }break;
        case 8 : {
                $bln = 'Agustus';
            }break;
        case 9 : {
                $bln = 'September';
            }break;
        case 10 : {
                $bln = 'Oktober';
            }break;
        case 11 : {
                $bln = 'November';
            }break;
        case 12 : {
                $bln = 'Desember';
            }break;
        default: {
                $bln = 'UnKnown';
            }break;
    }
 
    $hari = date('N', strtotime($date));
    switch ($hari) {
        case 0 : {
                $hari = 'Minggu';
            }break;
        case 1 : {
                $hari = 'Senin';
            }break;
        case 2 : {
                $hari = 'Selasa';
            }break;
        case 3 : {
                $hari = 'Rabu';
            }break;
        case 4 : {
                $hari = 'Kamis';
            }break;
        case 5 : {
                $hari = "Jum'at";
            }break;
        case 6 : {
                $hari = 'Sabtu';
            }break;
        default: {
                $hari = 'UnKnown';
            }break;
    }
 
    $tanggalIndonesia = " ".$hari.", ".$tgl . " " . $bln . " " . $thn;
    return $tanggalIndonesia;
}
 
?>

<h4 class="text-center font-weight-bold text-warning"><?= TanggalIndonesia(date('Y-m-d')) ?></h4>
		
		<hr>
		<br>
	


		<form method="post" action="tambah_jadwal.php">
		<button type="submit" class="btn btn-primary float-right ml-3" >Tambah Jadwal</button>
		</form>
		<form method="post" action="hapus_semua.php">
		<button type="submit" class="btn btn-primary float-right" >Hapus Semua</button>
		</form>
		
		<br>
		<br>

		
		<div class="table-responsive">
		<table class="table table-striped table-primary table-hover table-sm table-bordered ">
			<thead class="thead-dark">
				<tr>
					<th>NO.</th>
					<th>LAPORAN POLISI</th>
					<th>PERKARA</th>
					<th>NAMA SAKSI</th>
					<th>PENYIDIK</th>
					<th>UNIT</th>
					<th>JAM</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				function tanggal_indo($tanggal, $cetak_hari = false)
				{
					$hari = array ( 1 =>    'Senin',
								'Selasa',
								'Rabu',
								'Kamis',
								'Jumat',
								'Sabtu',
								'Minggu'
							);
							
					$bulan = array (1 =>   'Januari',
								'Februari',
								'Maret',
								'April',
								'Mei',
								'Juni',
								'Juli',
								'Agustus',
								'September',
								'Oktober',
								'November',
								'Desember'
							);
					$split 	  = explode('-', $tanggal);
					$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
					
					if ($cetak_hari) {
						$num = date('N', strtotime($tanggal));
						return $hari[$num] . ', ' . $tgl_indo;
					}
					return $tgl_indo;
				}
				
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM jadwal ORDER BY tanggal DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						$tanggal = date('Y-m-d', strtotime($data['tanggal']));
						//menampilkan data perulangan
						echo '
						<tr>
							<td style="background-color: dark;">'.$no.'</td>
							<td style="background-color: aqua;">'.$data['laporan'].'</td>
							<td style="background-color: aqua;">'.$data['perkara'].'</td>
							<td style="background-color: aqua;">'.$data['saksi'].'</td>
							<td style="background-color: aqua;">'.$data['penyidik'].'</td>
							<td style="background-color: aqua;">'.$data['unit'].'</td>
							<td style="background-color: aqua;">'.$data['jam'].'</td>
							
							<td>
								
								<a href="delete.php?id='.$data['id'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="9">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
		</div>
		
	
	
<?php

?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<p class="text-secondary"><span id="waktu">30</span></p>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
	var $el = $(".table-responsive");
function anim() {
  var st = $el.scrollTop();
  var sb = $el.prop("scrollHeight")-$el.innerHeight();
  $el.animate({scrollTop: st<sb/2 ? sb : 0}, 10000, anim);
}
function stop(){
  $el.stop();
}
anim();
$el.hover(stop, anim);
	</script>
</body>
</html>