<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (count($invoices_years) > 1 || isset($invoices_total_currencies)) { ?>
    <div class="d-flex justify-content-start mb-2">
    <?php if (isset($invoices_total_currencies)) { ?>
    <div class="me-3">
        <select class="form-select" name="total_currency" onchange="init_invoices_total();">
            <?php foreach ($invoices_total_currencies as $currency) {
                $selected = '';
                if (!$this->input->post('currency')) {
                    if ($currency['isdefault'] == 1 || isset($_currency) && $_currency == $currency['id']) {
                        $selected = 'selected';
                    }
                } else {
                    if ($this->input->post('currency') == $currency['id']) {
                        $selected = 'selected';
                    }
                } ?>
            <option value="<?php echo $currency['id']; ?>" <?php echo $selected; ?>>
                <?php echo $currency['symbol']; ?> - <?php echo $currency['name']; ?>
            </option>
            <?php
            } ?>
        </select>
    </div>
    <?php } ?>
    <?php if (count($invoices_years) > 1) { ?>
    <div class="me-3">
        <select class="form-select" name="invoices_total_years" onchange="init_invoices_total();" multiple id="invoices_total_years">
            <?php foreach ($invoices_years as $year) { ?>
            <option value="<?php echo $year['year']; ?>" <?php if ($this->input->post('years') && in_array($year['year'], $this->input->post('years')) || !$this->input->post('years') && date('Y') == $year['year']) {
                echo ' selected';
            } ?>>
                <?php echo $year['year']; ?>
            </option>
            <?php } ?>
        </select>
    </div>
    <?php } ?>
</div>



<?php } ?>
<div class="row">
    <div class="col-sm-12 col-md-4 mb-3">
        <div class="card">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-5.png);"></div>

            <div class="card-body">
                <h5 class="card-title text-warning"><?php echo _l('outstanding_invoices'); ?></h5>
                <p class="card-text text-primary font-weight-bold"><?php echo app_format_money($total_result['due'], $total_result['currency']); ?></p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <div class="card">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-5.png);"></div>

            <div class="card-body">
                <h5 class="card-title text-muted"><?php echo _l('past_due_invoices'); ?></h5>
                <p class="card-text text-primary font-weight-bold"><?php echo app_format_money($total_result['overdue'], $total_result['currency']); ?></p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <div class="card">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-5.png);"></div>

            <div class="card-body">
                <h5 class="card-title text-success"><?php echo _l('paid_invoices'); ?></h5>
                <p class="card-text text-primary font-weight-bold"><?php echo app_format_money($total_result['paid'], $total_result['currency']); ?></p>
            </div>
        </div>
    </div>
</div>


<script>
(function() {
    if (typeof(init_selectpicker) == 'function') {
        init_selectpicker();
    }
})();
</script>