<?php
require_once('../../layout/wrapperuser/head.php');
require_once('../../layout/wrapperuser/sidebar.php');
require_once('../../layout/wrapperuser/header.php');
require_once('../../layout/wrapperuser/content.php');
?>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Hasil Diagnosis</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Gejala 1 </th>
                                            <th>Gejala 2 </th>
                                            <th>Gejala 3 </th>
                                            <th>Gejala 4 </th>
                                            <th>Gejala 5 </th>
                                            <th>Gejala 6 </th>
                                            <th>Gejala 7 </th>
                                            <th>Gejala 8 </th>
                                            <th>Gejala 9 </th>
                                            <th>Gejala 10 </th>
                                            <th>Hasil</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$no = 1;
										$query = "SELECT *, kategori FROM tb_temp a left join tb_kategori z ON z.id_kategori = a.id_kategori";
										$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if (mysqli_num_rows($sql) > 0) {
											while ($row = mysqli_fetch_array($sql)) {
										?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $row['n_temp_1'] ?></td>
                                            <td><?= $row['n_temp_2'] ?></td>
                                            <td><?= $row['n_temp_3'] ?></td>
                                            <td><?= $row['n_temp_4'] ?></td>
                                            <td><?= $row['n_temp_5'] ?></td>
                                            <td><?= $row['n_temp_6'] ?></td>
                                            <td><?= $row['n_temp_7'] ?></td>
                                            <td><?= $row['n_temp_8'] ?></td>
                                            <td><?= $row['n_temp_9'] ?></td>
                                            <td><?= $row['n_temp_10'] ?></td>
                                            <td><?= $row['total_temp'] ?> </td>
                                            <td><?= $row['kategori'] ?> </td>
                                        </tr>
                                        <?php
											}
										} else {
											echo "<tr><td colspan=\"14\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Hasil Pengurutan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Gejala 1 </th>
                                            <th>Gejala 2 </th>
                                            <th>Gejala 3 </th>
                                            <th>Gejala 4 </th>
                                            <th>Gejala 5 </th>
                                            <th>Gejala 6 </th>
                                            <th>Gejala 7 </th>
                                            <th>Gejala 8 </th>
                                            <th>Gejala 9 </th>
                                            <th>Gejala 10 </th>
                                            <th>Hasil</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$no = 1;
										$query = "SELECT *, kategori FROM tb_temp a left join tb_kategori z ON z.id_kategori = a.id_kategori ORDER BY total_temp ASC LIMIT 10 ";
										$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if (mysqli_num_rows($sql) > 0) {
											while ($row = mysqli_fetch_array($sql)) {
										?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $row['n_temp_1'] ?></td>
                                            <td><?= $row['n_temp_2'] ?></td>
                                            <td><?= $row['n_temp_3'] ?></td>
                                            <td><?= $row['n_temp_4'] ?></td>
                                            <td><?= $row['n_temp_5'] ?></td>
                                            <td><?= $row['n_temp_6'] ?></td>
                                            <td><?= $row['n_temp_7'] ?></td>
                                            <td><?= $row['n_temp_8'] ?></td>
                                            <td><?= $row['n_temp_9'] ?></td>
                                            <td><?= $row['n_temp_10'] ?></td>
                                            <td><?= $row['total_temp'] ?> </td>
                                            <td><?= $row['kategori'] ?> </td>
                                        </tr>
                                        <?php
											}
										} else {
											echo "<tr><td colspan=\"14\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Rekomendasi Investasi Terbaik Untuk Peserta</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Gejala 1 </th>
                                            <th>Gejala 2 </th>
                                            <th>Gejala 3 </th>
                                            <th>Gejala 4 </th>
                                            <th>Gejala 5 </th>
                                            <th>Gejala 6 </th>
                                            <th>Gejala 7 </th>
                                            <th>Gejala 8 </th>
                                            <th>Gejala 9 </th>
                                            <th>Gejala 10 </th>
                                            <th>Hasil</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$no = 1;
										$query = "SELECT *, kategori FROM tb_temp a left join tb_kategori z ON z.id_kategori = a.id_kategori ORDER BY total_temp ASC LIMIT 1";
										$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if (mysqli_num_rows($sql) > 0) {
											while ($row = mysqli_fetch_array($sql)) {
										?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $row['n_temp_1'] ?></td>
                                            <td><?= $row['n_temp_2'] ?></td>
                                            <td><?= $row['n_temp_3'] ?></td>
                                            <td><?= $row['n_temp_4'] ?></td>
                                            <td><?= $row['n_temp_5'] ?></td>
                                            <td><?= $row['n_temp_6'] ?></td>
                                            <td><?= $row['n_temp_7'] ?></td>
                                            <td><?= $row['n_temp_8'] ?></td>
                                            <td><?= $row['n_temp_9'] ?></td>
                                            <td><?= $row['n_temp_10'] ?></td>
                                            <td><?= $row['total_temp'] ?> </td>
                                            <td><?= $row['kategori'] ?> </td>
                                        </tr>
                                        <?php
											}
										} else {
											echo "<tr><td colspan=\"14\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
										}
										?>

                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    <a href="simpan.php" class="btn btn-success float-right"><i class="fa fa-save"></i>
                                        Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('../../layout/wrapperuser/footer.php');
?>