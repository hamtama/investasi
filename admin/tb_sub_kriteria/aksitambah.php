<?php
require_once('../../login/connection.php');
$kriteria = $_POST['kriteria'];
$sub_kriteria = $_POST['sub_kriteria'];
$bobot = $_POST['bobot'];
$cek = mysqli_num_rows($mysqli->query("SELECT sub_kriteria FROM tb_sub_kriteria WHERE sub_kriteria ='$kriteria'"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT sub_kriteria,id_kriteria FROM tb_sub_kriteria WHERE sub_kriteria ='$kriteria' AND kriteria ='$sub_kriteria'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($cek > 1) {
?>
<script language="javascript">
alert('Nama Sub Kriteria Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
	} else if ($cek2 > 1) {
	?>
<script language="javascript">
alert('Nama Sub Kriteria Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php

	} else {
		$sql = $mysqli->query("INSERT INTO tb_sub_kriteria SET id_kriteria ='$kriteria', sub_kriteria='$sub_kriteria', id_skala='$bobot'");
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