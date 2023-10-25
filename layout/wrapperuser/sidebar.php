<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Diagnosis</h3>
        <ul class="nav side-menu">
            <li><a href=""><i class="fa fa-dashboard"></i>Beranda</a></li>
            <li><a><i class="fa fa-book"></i>Pakar <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="../../users/diagnosis/diagnosis.php"><i class="fa fa-file-text-o"></i>Diagnosa</a></li>
                    <li><a href="../../users/diagnosis/tempdata.php"><i class="fa fa-file-text-o"></i>Hasil
                            Perhitungan</a>
                    </li>
                    <li><a href="../../users/diagnosis/hasil.php"><i class="fa fa-file-text-o"></i>Hasil Diagnosa</a>
                    </li>
                </ul>
            </li>
            <li><a href="../../login/index.php" onclick="return login(this);"><i class="fa fa-sign-in"></i>Login
                    Admin</a>
            </li>
        </ul>

    </div>
</div>
<!-- /sidebar menu -->
</div>
</div>
<script type="text/javascript">
function login(node) {
    return confirm("Apakah Anda Ingin Masuk Ke Halaman Admin");
    window.location.href = '../../login/index.php';
}
</script>