<?php
require_once('../../login/connection.php');
$data_input = array();
$k = array();
$cf = array();
$sr = array();
$nama = $_POST['nama'];
$email = $_POST['email'];
// $id = array();
$yy = 1;
$kriteria = mysqli_query($mysqli, "SELECT * FROM tb_kriteria");
while ($a = mysqli_fetch_array($kriteria)) {
    $id[$yy] = $a['id_kriteria'];
    $yy++;
}


// print_r($id);
// $kategori = $_POST['kategori'];
// AMBIL DATA KRITERIA DARI FORM TAMBAH DATA
for ($i = 0; $i <= sizeof($id); $i++) {
    print_r($id[$i]);
    $kriteria = mysqli_query($mysqli, "SELECT * FROM tb_kriteria where id_kriteria='$id[$i]'");
    $jumlah = mysqli_num_rows($kriteria);
    while ($a = mysqli_fetch_array($kriteria)) {
        $j = $a['id_kriteria'];
        $k['kriteria' . $i] = "kriteria" . $j;
        $k['kriteria' . $i];
    }
}

// AMBIL COLOM YANG MEMILIKI GEJALA PADA TABLE RULE
$ruleGejala = mysqli_query($mysqli, "SHOW COLUMNS FROM tb_pengetahuan WHERE Field LIKE '%gejala%'");
$tg = 1;
while($fc = mysqli_fetch_assoc($ruleGejala)){
    $fetchCol[$tg] = $fc['Field'];
    $tg++;
}
$maxgejala = $ruleGejala->num_rows;

// AMBIL VALUE PADA TABLE RULE BERDASARKAN KATEGORI YANG DIPILIH


$sql_rujukan = mysqli_query($mysqli, "SELECT * FROM tb_pengetahuan") or die (mysql_error($mysqli));
$maxrujukan = $sql_rujukan->num_rows;
$th = 1;
while ($row = mysqli_fetch_array($sql_rujukan)){
    $sr['R'.$th] = $row[0];
    $sr['kategori'.$th] = $row['id_kategori'];
    $th++;
}
// print_r($sr);
// echo "maksimal gejala :".$maxrujukan;
// AMBIL VALUE PADA TABLE RULE BERDASARKAN KATEGORI YANG DIPILIH

for ($i=1 ;$i<=$maxrujukan; $i++){
    $x[$i] = $sr['R'.$i];
    for ($j=1 ;$j<=$maxgejala; $j++){
        $sql_pengetahuan = mysqli_query($mysqli, "SELECT $fetchCol[$j] FROM tb_pengetahuan WHERE id_pengetahuan='$x[$i]'") or die (mysqli_error($mysqli));
        while ($row = mysqli_fetch_array($sql_pengetahuan)){
            if ($row[0] != NULL){
                $cf[$i]['G'.$j]= $row[0]; 
            } else {
                $cf[$i]['G'.$j]= 0;
            }
        }
    }
}
// print_r($cf);


// AMBIL DATA NILAI SKALA DARI TABLE RULE UNTUK PERHITUNGAN DARI DATA INPUT USER
for ($i=1 ;$i<=$maxrujukan; $i++){
    for ($j=1 ;$j<=$maxgejala; $j++){
        $a[$i][$j] = $cf[$i]['G'.$j];
        // echo "SELECT * FROM tb_sub_kriteria a inner join tb_skala b ON b.id_skala = a.id_skala WHERE id_sub_kriteria='".$a[$i][$j] ."';";
        $sql_rule = mysqli_query($mysqli, "SELECT * FROM tb_sub_kriteria a inner join tb_skala b ON b.id_skala = a.id_skala WHERE id_sub_kriteria='".$a[$i][$j]."'") or die (mysql_error($mysqli));
        while ($row = mysqli_fetch_array($sql_rule)){
            if ($row[0] != NULL){
                $cf[$i]['G'.$j]= $row[0]; 
                $cf[$i]['nilai_skala'.$j]= $row['nilai_skala']; 
            } else {
                $cf[$i]['G'.$j] = 0;
                $cf[$i]['nilai_skala'.$j]= ''; 
            }
        }
    }
}
// print_r($cf);
$l = sizeof($k);
// print_r($_POST);



// AMBIL DATA NILAI SKALA DARI DATA YANG DIINPUTKAN OLEH USER
for ($i = 1; $i <= $maxgejala; $i++) {
    $post[$i] = $_POST[$k['kriteria' . $i]];
    // echo "SELECT * FROM tb_sub_kriteria a inner join tb_skala b ON b.id_skala = a.id_skala WHERE id_sub_kriteria='$post[$i]'";
    $sql_kriteria = mysqli_query($mysqli, "SELECT * FROM tb_sub_kriteria a inner join tb_skala b ON b.id_skala = a.id_skala WHERE id_sub_kriteria='$post[$i]'") or die (mysql_error($mysqli));
        while ($row = mysqli_fetch_array($sql_kriteria)){
            if ($row[0] != NULL){
                $n_user['N'.$i]= $row[0]; 
                $n_user['nilai_skala'.$i]= $row['nilai_skala']; 
            } else {
                $n_user['N'.$i] = 0;
                $n_user['nilai_skala'.$i]= ''; 
            }
        }
}
// print_r($n_user);

$insert = "INSERT INTO tb_pengetahuan SET ";
for ($i = 1; $i<=$maxgejala; $i++){
    if($post[$i] != ''){
        $insert .= "gejala_".$i." = '".$post[$i]."'";
        if($i != $maxgejala){
            $insert .= ", ";
        }
    } 
}

$insert_diagnosis = mysqli_query($mysqli,"INSERT INTO tb_diagnosis SET nama ='$nama', email='$email'");
// echo $insert;
$insert = mysqli_query($mysqli, $insert);
// PERHITUNGAN 
for ($i = 1; $i <= $maxrujukan; $i++) {
    for ($j = 1; $j <= $maxgejala; $j++) {
        // echo "pertitungan".[$i][$j]. "= ". $n_user['nilai_skala'.$j]." - ".$cf[$i]['nilai_skala'.$j];
        $perhitungan[$i][$j] = $n_user['nilai_skala'.$j]-$cf[$i]['nilai_skala'.$j];
        $nilai[$i]['hasil' . $j] = pow($perhitungan[$i][$j], 2);
        $nilai['hasilakhir'.$i] += $nilai[$i]['hasil'.$j];
        $nilai['Akar'.$i] = sqrt($nilai['hasilakhir'.$i]);

        
        // $hitung += $perhitungan[$i];
        // $jumlah[$i]['Jumlah'.$j] = array_sum(array_column($nilai,$nilai[$i]['hasil' . $j]))   ;
        // echo $n_user['nilai_skala'.$i]."-".$cf[$i]['nilai_skala'.$j]. "=".$nilai[$i]['hasil' . $j]."<br>" ;
        // echo $perhitungan[$i];   
    }  
}



// print_r($nilai);
// $akar = sqrt($jumlah);
// print_r($akar);
// echo "hitung = ".$hitung;
// echo "Akar dari = ".pow(0,2);

$n_temp = array();
for ($i = 1; $i <= $maxrujukan; $i++) {
    for ($j = 1; $j<=$maxgejala; $j++){
        if($nilai[$i]['hasil' . $j]!= ''){
            $n_temp[$i]  .= "'".$nilai[$i]['hasil' . $j]."'";
            if($i != $maxrujukan+1){
                $n_temp[$i]  .= ",";
            } 
        }  else {
            $nilai[$i]['hasil' . $j] = 0;
            $n_temp[$i] .= "'".$nilai[$i]['hasil' . $j]."'";
            if($i != $maxrujukan+1){
                $n_temp[$i]  .= ",";
            }
        }
    }
}
for ($i = 1; $i <= $maxrujukan; $i++) {
    $n_temp_a[$i] = $n_temp[$i];
}

// print_r($n_temp_a);
$values = "INSERT INTO tb_temp VALUES ";
for ($i = 1; $i <= $maxrujukan; $i++) {
  
        $values .= "(NULL,".$n_temp[$i]."'".$nilai['Akar'.$i]."','".$sr['kategori'.$i]."')";
        if($i != $maxrujukan){
            $values .= ",";
        }
        
        // $sql = mysqli_query($mysqli, "INSERT INTO tb_temp VALUES $values");
}
// echo $values;


// echo "INSERT INTO tb_pengetahuan VALUES (NULL, $n_kriteria, '$akar','$kategori')";
// $sql_insert = mysqli_query($mysqli, "INSERT INTO tb_pengetahuan VALUES (NULL, $n_kriteria, '$akar','$kategori');");
$sql_truncate = mysqli_query($mysqli, "TRUNCATE TABLE tb_temp");
$sql_insert = mysqli_query($mysqli, $values);
if($sql_insert && $sql_truncate){
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