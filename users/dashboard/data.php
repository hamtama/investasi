<?php
require_once('../../layout/wrapperuser/head.php');
require_once('../../layout/wrapperuser/sidebar.php');
require_once('../../layout/wrapperuser/header.php');
require_once('../../layout/wrapperuser/content.php');
$data_training = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_pengetahuan");
while ($row = mysqli_fetch_array($data_training)) {
    $training = $row[0];
}
$data_diagnosis = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_diagnosis");
while ($row2 = mysqli_fetch_array($data_diagnosis)) {
    $diagnosis = $row2[0];
}
$data_kategori = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_kategori");
while ($row3 = mysqli_fetch_array($data_kategori)) {
    $kategori = $row3[0];
}
?>
<div class="col-md-12 col-sm-12">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Jumlah Data Training</h5>

                <h1 class="card-text"><?=$training?> <i class="fa fa-bar-chart"></i> </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Jumlah Hasil Diagnosis</h5>

                <h1 class="card-text"><?=$diagnosis?> <i class="fa fa-bar-chart"></i> </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">


        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Rekomendasi Investasi</h5>

                <h1 class="card-text"><?=$kategori?> <i class="fa fa-bar-chart"></i> </p>
            </div>
        </div>
    </div>
</div>
<?php
require_once('../../layout/wrapperuser/footer.php');
?>