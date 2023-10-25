<?php
require_once('../../login/connection.php');
$kriteria = $_POST['kriteria'];
$sub_kriteria = $_POST['sub_kriteria'];
$bobot = $_POST['bobot'];
$id = $_POST['id'];
$cek = mysqli_num_rows($mysqli->query("SELECT sub_kriteria FROM tb_sub_kriteria WHERE sub_kriteria ='$sub_kriteria'"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT sub_kriteria,id_kriteria FROM tb_sub_kriteria WHERE sub_kriteria ='$sub_kriteria' AND id_kriteria ='$kriteria'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($cek > 1) {
?>
<script language="javascript">
alert('Nilai Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
	} elseif ($cek2 > 1) {
	?>
<script language="javascript">
alert('Status Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
	} else {
		$sql = $mysqli->query("UPDATE tb_sub_kriteria SET id_kriteria ='$kriteria', sub_kriteria ='$sub_kriteria', id_skala='$bobot' WHERE id_sub_kriteria ='$id'");
		if ($sql) {
		?>
<script language="javascript">
alert('Edit Data Berhasil');
document.location = 'data.php';
</script>
<?php
		} else {
			echo "Input Silahkan Ulangi !";
		}
	}
}
?>