<?php
require_once('../../login/connection.php');

$query_pengetahuan = "SELECT *  FROM tb_pengetahuan ORDER BY id_pengetahuan DESC LIMIT 1";
$sql_pengetahuan = mysqli_query($mysqli, $query_pengetahuan) or die(mysqli_error($query_pengetahuan));
while ($row = mysqli_fetch_array($sql_pengetahuan)) {
    $hasil = $row['hasil'];
    $kategori = $row['id_kategori'];
    $id_pengetahuan = $row['id_pengetahuan'];
}

$query = "SELECT kategori,`*`, a.id_kategori as id_kat FROM tb_temp a left join tb_kategori z ON z.id_kategori = a.id_kategori ORDER BY total_temp ASC LIMIT 1";
$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {
        $id = $id_pengetahuan;
        $total = $row['total_temp'] ;
        $kategori = $row['id_kat'];  

        $sql_insert = mysqli_query($mysqli, "UPDATE tb_pengetahuan SET 
        hasil = '$total',
        id_kategori = '$kategori' WHERE id_pengetahuan = '$id'") ;
    }
}
if($sql_insert){
    echo "input berhasil";
    ?>
<script language="javascript">
alert('Input Data Berhasil');
document.location = 'tempdata.php';
</script>
<?php
} else {
     echo "Input Silahkan Ulangi !";
}                        
?>