<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (count($estimates_years) > 1 || isset($currencies)) { ?>
<div class="tw-flex tw-space-x-3 tw-mb-2">
    <?php if (isset($currencies)) { ?>
    <div class="!tw-w-28 simple-bootstrap-select">
        <select class="selectpicker !tw-w-28" data-width="auto" name="total_currency"
            onchange="init_estimates_total();">
            <?php foreach ($currencies as $currency) {
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
            <option value="<?php echo $currency['id']; ?>" <?php echo $selected; ?>
                data-subtext="<?php echo $currency['name']; ?>"><?php echo $currency['symbol']; ?></option>
            <?php
} ?>
        </select>
    </div>
    <?php } ?>
    <?php
      if (count($estimates_years) > 1) { ?>
    <div class="simple-bootstrap-select !tw-max-w-xs">
        <select data-none-selected-text="<?php echo date('Y'); ?>" data-width="auto" class="selectpicker tw-w-full"
            multiple name="estimates_total_years" onchange="init_estimates_total();">
            <?php foreach ($estimates_years as $year) { ?>
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
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
    <?php
    foreach ($totals as $key => $data) {
        $class = estimate_status_color_class($data['status']);
        $name  = estimate_status_by_id($data['status']); ?>
    <div class="col">
        <div class="card border-0 shadow-sm">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-2.png);"></div>

            <div class="card-body">
                <h5 class="card-title text-<?php echo $class; ?> mb-4"><?php echo $name; ?></h5>
                <p class="card-text text-muted">
                    <?php echo app_format_money($data['total'], $data['currency_name']); ?>
                </p>
            </div>
        </div>
    </div>
    <?php
    } ?>
</div>

<script>
$(function() {
    init_selectpicker();
});
</script>