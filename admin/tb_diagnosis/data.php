<?php
require_once ('../../layout/wrapperadmin/head.php');
require_once ('../../layout/wrapperadmin/sidebar.php');
require_once ('../../layout/wrapperadmin/header.php');
require_once ('../../layout/wrapperadmin/content.php');
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
                                            <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                                            <th>No </th>
                                            <th>Nama </th>
                                            <th>Email </th>
                                            <th>Kategori </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$no = 1;
										$query = "SELECT * FROM tb_diagnosis a INNER JOIN tb_kategori b ON a.id_kategori = b.id_kategori";
										$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if(mysqli_num_rows($sql) > 0) {
										while ($row = mysqli_fetch_array($sql)){
										?>
                                        <tr>
                                            <td style="width:10%">
                                                <button class="btn btn-danger btn-xs"
                                                    onclick="javascript:delete_id(<?=$row['id_diagnosis']?>)"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                            <td><?=$no++?>.</td>
                                            <td><?=$row['nama']?>.</td>
                                            <td><?=$row['email']?>.</td>
                                            <td><?=$row['kategori']?></td>
                                        </tr>
                                        <?php
										}}
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

<?php
require_once ('../../layout/wrapperadmin/footer.php');
?>
<script type="text/javascript">
function delete_id(id) {
    if (confirm('Anda Serius Untuk Menghapus Data ?')) {
        window.location.href = 'hapus.php?delete_id=' + id;
    }
}
</script>