<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if (!$this->import->isSimulation()) { ?>
                <div class="alert alert-info">
                    <?php echo $this->import->importGuidelinesInfoHtml(); ?>
                </div>
                <?php } ?>
                            <div class="mb-1 d-flex justify-content-between align-items-center">
                <h4 class="font-weight-bold text-lg text-muted">
                    <?php echo _l('import_items'); ?>
                </h4>
                <div>
                    <?php echo $this->import->downloadSampleFormHtml(); ?>
                </div>
            </div>

                <div class="card">
                    <div class="card-body">
                        <?php echo $this->import->maxInputVarsWarningHtml(); ?>
                        <?php if (!$this->import->isSimulation()) { ?>
                        <?php echo $this->import->createSampleTableHtml(); ?>

                        <?php } else { ?>

                        <div class="mb-6">
                            <?php echo $this->import->simulationDataInfo(); ?>
                        </div>

                        <?php echo $this->import->createSampleTableHtml(true); ?>

                        <?php } ?>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo form_open_multipart($this->uri->uri_string(), ['id' => 'import_form']) ; ?>
                                <?php echo form_hidden('items_import', 'true'); ?>
                                <?php echo render_input('file_csv', 'choose_csv_file', '', 'file'); ?>
                                <div class="form-group">
                                    <button type="button"
                                        class="btn btn-falcon-info import btn-import-submit"><?php echo _l('import'); ?></button>
                                    <button type="button"
                                        class="btn btn-falcon-info simulate btn-import-submit"><?php echo _l('simulate_import'); ?></button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
<script src="<?php echo base_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
<script>
$(function() {
    appValidateForm($('#import_form'), {
        file_csv: {
            required: true,
            extension: "csv"
        }
    });
});
</script>
</body>

</html>
