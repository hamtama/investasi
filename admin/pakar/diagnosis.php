<?php
require_once('../../layout/wrapperadmin/head.php');
require_once('../../layout/wrapperadmin/sidebar.php');
require_once('../../layout/wrapperadmin/header.php');
require_once('../../layout/wrapperadmin/content.php');
?>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Bobot</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <form role="form" action="aksi.php" method="post" name="add_name" id="add_name">
                    <ol>
                        <?php
                    $query = "SELECT * FROM tb_kriteria Order By id_kriteria ASC";
                    $sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
                    if (mysqli_num_rows($sql) > 0) {
                        while ($row = mysqli_fetch_array($sql)) {
                            $id_kriteria =  $row['id_kriteria'];
                    ?>

                        <li><?= $row['pertanyaan']; ?>
                            <?php
                                $i = 5;
                                $query_2 = "SELECT * FROM tb_sub_kriteria a left join tb_kriteria b ON b.id_kriteria = a.id_kriteria 
                                left join tb_skala c ON c.id_skala = a.id_skala where a.id_kriteria='$id_kriteria'";
                                $sql_2 = mysqli_query($mysqli, $query_2) or die(mysqli_error($query_2));
                                if (mysqli_num_rows($sql_2) > 0) {
                                    while ($row2 = mysqli_fetch_array($sql_2)) {
                                ?>
                            <div class="form-group col-md-12 row ">
                                <input type="checkbox" checked class="d-none" name="id_kriteria[]"
                                    value="<?= $id_kriteria ?>">
                                <div class="radio pb-0">
                                    <div class="icheck-greensea ">
                                        <input class="kti" type="radio" id="kriteria<?= $row2['id_sub_kriteria'] ?>"
                                            name="kriteria<?= $row2['id_kriteria'] ?>"
                                            value="<?= $row2['id_sub_kriteria'] ?>">
                                        <label
                                            for="kriteria<?= $row2['id_sub_kriteria'] ?>"><?= $row2['sub_kriteria'] ?></label>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                                } else {
                                    echo "Data Tidak Ada";
                                }

                                ?>
                        </li>
                        <?php
                        }
                    } else {
                        echo "Data Tidak Ditemukan";
                    }
                    ?>
                    </ol>
                    <div class="form-group">
                        <div class="col-md-12 offset-md-12 d-flex justify-content-center  ">
                            <input type="hidden" id="masuk" name="ninja" value="mbuh">
                            <button type='reset' class="btn btn-danger" id="reset">Reset</button>
                            <button type='submit' class="btn btn-primary" id="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once('../../layout/wrapperadmin/footer.php');
?>