
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="_buttons">
                    <?php if (has_permission('contracts', '', 'create')) { ?>
                    <a href="<?php echo admin_url('contracts/contract'); ?>"
                        class="btn btn-falcon-info pull-left display-block mb-3">
                        <i class="fas fa-plus-circle me-1"></i>
                        <?php echo _l('new_contract'); ?>
                    </a>
                    <?php } ?>
                    <?php $this->load->view('admin/contracts/filters'); ?>
                    <div class="clearfix"></div>
                    <div id="contract_summary">
                      <div class="row">
                        <div class="col-lg-12">
                                    <h3 class="mt-1 mb-3 font-semibold text-monospace text-uppercase text-lg text-center">
                                        <i class="far fa-file-alt me-2"></i>
                                            <?php echo _l('contract_summary_heading'); ?> 
                                    </h3>
                             </div></div>
                                    <div class="row">
                                    <div class="col-md-1"></div> <!-- Add an empty column as a spacer -->
                            <div class="col-md-2 ">    
                                <div class="border rounded p-3 text-center card">
                                <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-5.png);"></div>
                                <div class="card-body">
                                <span class="font-weight-semibold text-lg">
                                        <?php echo $count_active; ?>
                                    </span>
                                    <span class="text-info">
                                        <?php echo _l('contract_summary_active'); ?>
                                    </span>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-2">
                                <div class="border rounded p-3 text-center card">
                                 <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-5.png);"></div>
                                 <div class="card-body">
                                 <span class="font-weight-semibold text-lg">
                                        <?php echo $count_expired; ?>
                                    </span>
                                    <span class="text-danger">
                                        <?php echo _l('contract_summary_expired'); ?>
                                    </span>
                                </div>
                            </div></div>
                            <div class="col-md-2">
                                <div class="border rounded p-3 text-center card">
                                        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-5.png);"></div>
                                        <div class="card-body">
                                        <span class="font-weight-semibold text-lg">
                                        <?php echo count($expiring); ?>
                                    </span>
                                    <span class="text-warning">
                                        <?php echo _l('contract_summary_about_to_expire'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-2">
                                <div class="border rounded p-3 text-center card">
                                    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-5.png);"></div>
                                 <div class="card-body">
                                    <span class="font-weight-semibold text-lg">
                                        <?php echo $count_recently_created; ?>
                                    </span>
                                    <span class="text-success">
                                        <?php echo _l('contract_summary_recently_added'); ?>
                                    </span>
                                </div>
                            </div></div>
                            <div class="col-md-2">
                                <div class="border rounded p-3 text-center card">
                                   <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-5.png);"></div>
                                <div class="card-body">
                                   <span class="font-weight-semibold text-lg">
                                        <?php echo $count_trash; ?>
                                    </span>
                                    <span class="text-dark">
                                        <?php echo _l('contract_summary_trash'); ?>
                                    </span>
                                </div></div>
    </div>
</div>

                    </div>
                </div>
                </div>
                
                <div class="card panel_s mt-3 sm:mt-4  ">
    <?php echo form_hidden('custom_view'); ?>
    <div class="panel-body">
        <div class="row">
<div class="card-header">
            <div class="col-md-6 border-right text-center">
                <h4 class="font-semibold mb-4">
                    <?php echo _l('contract_summary_by_type'); ?></h4>
                <div class="relative" style="max-height: 400px;">
                    <canvas class="chart" height="400" id="contracts-by-type-chart"></canvas>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <h4 class="font-semibold mb-4 ">
                    <?php echo _l('contract_summary_by_type_value'); ?>
                    (<span data-toggle="tooltip" data-title="<?php echo _l('base_currency_string'); ?>"
                        class="text-has-action">
                        <?php echo $base_currency->name; ?></span>)
                </h4>
                <div class="relative" style="max-height: 400px;">
                    <canvas class="chart" height="400" id="contracts-value-by-type-chart"></canvas>
                </div>
            </div>
        </div>

        </div>
        <div class="card-body">
        <div class="table-responsive mt-5">
            <?php $this->load->view('admin/contracts/table_html'); ?>
        </div>
    </div></div>
</div>
        </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
<script>
$(function() {

    var ContractsServerParams = {};
    $.each($('._hidden_inputs._filters input'), function() {
        ContractsServerParams[$(this).attr('name')] = '[name="' + $(this).attr('name') + '"]';
    });

    initDataTable('.table-contracts', admin_url + 'contracts/table', undefined, undefined,
        ContractsServerParams,
        <?php echo hooks()->apply_filters('contracts_table_default_order', json_encode([6, 'asc'])); ?>);

    new Chart($('#contracts-by-type-chart'), {
        type: 'bar',
        data: <?php echo $chart_types; ?>,
        options: {
            legend: {
                display: false,
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    display: true,
                    ticks: {
                        suggestedMin: 0,
                    }
                }]
            }
        }
    });
    new Chart($('#contracts-value-by-type-chart'), {
        type: 'line',
        data: <?php echo $chart_types_values; ?>,
        options: {
            responsive: true,
            legend: {
                display: false,
            },
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    display: true,
                    ticks: {
                        suggestedMin: 0,
                    }
                }]
            }
        }
    });
});
</script>
</body>

</html>