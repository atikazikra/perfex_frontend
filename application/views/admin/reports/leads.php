<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
            <div class="d-flex align-items-center gap-3 mb-4">
                <a href="<?php echo admin_url('reports/leads?type=staff'); ?>" class="btn btn-falcon-success px-4 py-2">
                    <?php echo _l('switch_to_general_report'); ?>
                </a>
            </div>

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card shadow-lg mb-5 bg-white border-rounded animate__animated animate__fadeIn">
                <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>
                <div class="card-body">       
                <h3 class="card-title mb-0 text-center card-header mb-2"><?php echo _l('report_this_week_leads_conversions'); ?></h3>    
                        <canvas class="leads-this-week" height="150" id="leads-this-week"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card shadow-lg mb-5 bg-white border-rounded animate__animated animate__fadeIn">
                <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>
                <div class="card-body">       
                <h3 class="card-title mb-0 text-center card-header mb-2">                            
                        <?php echo _l('report_leads_sources_conversions'); ?></h3>
                        <canvas class="leads-sources-report" height="150" id="leads-sources-report"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 animate__animated animate__fadeIn">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary text-center text-uppercase text-monospace mb-2"><?php echo _l('report_leads_monthly_conversions'); ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <?php
                        echo '<select name="month" class="form-select" data-none-selected-text="' . _l('dropdown_non_selected_tex') . '">' . PHP_EOL;
                        for ($m = 1; $m <= 12; $m++) {
                            $_selected = '';
                            if ($m == date('m')) {
                                $_selected = ' selected';
                            }
                            echo '  <option value="' . $m . '"' . $_selected . '>' . _l(date('F', mktime(0, 0, 0, $m, 1))) . '</option>' . PHP_EOL;
                        }
                        echo '</select>' . PHP_EOL;
                    ?>
                </div>
            </div>
            <div class="relative mt-3" style="max-height:400px;">
                <canvas class="leads-monthly chart mt-3" id="leads-monthly" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
<?php init_tail(); ?>
<script>
var MonthlyLeadsChart;
$(function() {
    $.get(admin_url + 'reports/leads_monthly_report/' + $('select[name="month"]').val(), function(response) {
        var ctx = $('#leads-monthly').get(0).getContext('2d');
        MonthlyLeadsChart = new Chart(ctx, {
            'type': 'bar',
            data: response,
            options: {
                responsive: true,
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                },
            },
        });
    }, 'json');
    $('select[name="month"]').on('change', function() {
        MonthlyLeadsChart.destroy();
        $.get(admin_url + 'reports/leads_monthly_report/' + $('select[name="month"]').val(), function(
            response) {
            var ctx = $('#leads-monthly').get(0).getContext('2d');
            MonthlyLeadsChart = new Chart(ctx, {
                'type': 'bar',
                data: response,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                            }
                        }]
                    },
                },
            });
        }, 'json');
    });

    new Chart($("#leads-this-week"), {
        type: 'pie',
        data: <?php echo $leads_this_week_report; ?>,
        option: {
            responsive: true
        }
    });

    new Chart($('#leads-sources-report'), {
        type: 'bar',
        data: <?php echo $leads_sources_report; ?>,
        options: {
            responsive: true,
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            },
        },
    });
});
</script>
</body>

</html>
