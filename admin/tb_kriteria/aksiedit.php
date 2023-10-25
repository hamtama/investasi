<?php
require_once('../../login/connection.php');
$kriteria = $_POST['kriteria'];
$pertanyaan = $_POST['pertanyaan'];
$id = $_POST['id'];
$cek = mysqli_num_rows($mysqli->query("SELECT kriteria FROM tb_kriteria WHERE kriteria ='$kriteria'"));

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
		$sql = $mysqli->query("UPDATE tb_kriteria SET kriteria ='$kriteria', pertanyaan ='$pertanyaan' WHERE id_kriteria	 ='$id'");
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