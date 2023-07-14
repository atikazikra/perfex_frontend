<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
            <div class="d-flex align-items-center gap-3 mb-4">
                    <a href="<?php echo admin_url('reports/leads'); ?>" class="btn btn-falcon-success px-4 py-2">
                    <?php echo _l('switch_to_staff_report'); ?></a>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 animate__animated animate__fadeIn">
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <?php echo form_open($this->uri->uri_string() . '?type=staff'); ?>
            <div class="row g-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <?php echo render_date_input('staff_report_from_date', 'from_date', $this->input->post('staff_report_from_date')); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <?php echo render_date_input('staff_report_to_date', 'to_date', $this->input->post('staff_report_to_date')); ?>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-falcon-info"><?php echo _l('generate'); ?></button>
                </div>
            </div>
            <?php echo form_close(); ?>
            <hr />
            <div class="relative mt-3" style="max-height:380px;">
                <canvas class="leads-staff-report mt-3" height="380" id="leads-staff-report"></canvas>
            </div>
        </div>
    </div>
</div>


    </div>
</div>
</div>
<?php init_tail(); ?>
<script>
    window.onload = function(){
        new Chart($('#leads-staff-report'),{
            data:<?php echo $leads_staff_report; ?>,
            type:'bar',
            options:{responsive:true,maintainAspectRatio:false}
        })
    };
</script>
</body>
</html>
