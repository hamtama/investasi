<?php
require_once('../../login/connection.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
?>

<form role="form" method="post" action="aksitambah.php">
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Sub Kriteria<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control has-feedback-left" name="kriteria" required>
                <option value="">-- Pilih Kriteria --</option>
                <?php
                    $sql_kriteria = mysqli_query($mysqli, "SELECT * FROM tb_kriteria WHERE 1 ORDER BY id_kriteria ASC") or die(mysqli_error($mysqli));
                    while ($row = mysqli_fetch_array($sql_kriteria)) {
                        echo '<option value="' . $row['id_kriteria'] . '">' . $row['kriteria'] . '</option>
						option>';
                    }
                    ?>
            </select>
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Kriteria<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="sub_kriteria" required="required" class="form-control has-feedback-left">
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Sub Kriteria<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control has-feedback-left" name="bobot" required>
                <option value="">-- Pilih Bobot --</option>
                <?php
                    $sql_kriteria = mysqli_query($mysqli, "SELECT * FROM tb_skala WHERE 1 ORDER BY nilai_skala ASC") or die(mysqli_error($mysqli));
                    while ($row = mysqli_fetch_array($sql_kriteria)) {
                        echo '<option value="' . $row['id_skala'] . '">' . $row['nilai_skala'] . '</option>
						option>';
                    }
                    ?>
            </select>
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='reset' class="btn btn-danger">Reset</button>
            <button type='submit' class="btn btn-success">Simpan</button>
        </div>
    </div>

</form>
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>
<script type="text/javascript">
// initialize a validator instance from the "FormValidator" constructor.
// A "<form>" element is optionally passed as an argument, but is not a must
var validator = new FormValidator({
    "events": ['blur', 'input', 'change']
}, document.forms[0]);
// on form "submit" event
document.forms[0].onsubmit = function(e) {
    var submit = true,
        validatorResult = validator.checkAll(this);
    console.log(validatorResult);
    return !!validatorResult.valid;
};
// on form "reset" event
document.forms[0].onreset = function(e) {
    validator.reset();
};
// stuff related ONLY for this demo page:
$('.toggleValidationTooltips').change(function() {
    validator.settings.alerts = !this.checked;
    if (this.checked)
        $('form .alert').remove();
}).prop('checked', false);
</script>
<?php
}
?>