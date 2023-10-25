<?php
require_once('../../login/connection.php');
$kriteria = $_POST['kriteria'];
$pertanyaan = $_POST['pertanyaan'];
$cek = mysqli_num_rows($mysqli->query("SELECT kriteria FROM tb_kriteria WHERE kriteria ='$kriteria'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($cek > 1) {
?>
<script language="javascript">
alert('Nama Kriteria Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php

	} else {
		$sql = $mysqli->query("INSERT INTO tb_kriteria SET kriteria ='$kriteria', pertanyaan ='$pertanyaan'");
		if ($sql) {
		?>
<script language="javascript">
alert('Input Data Berhasil');
document.location = 'data.php';
</script>
<?php
		} else {
			echo "Input Silahkan Ulangi !";
		}
	}
}
?>