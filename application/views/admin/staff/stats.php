<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="staff_logged_time" data-toggle="tooltip" data-title="<?php echo _l('task_timesheets'); ?>"
    data-placement="top">
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-3">
    <div class="col">

        <div class="card border-success text-dark bg-white rounded">
<div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>

            <div class="card-body">
                <h5 class="card-title text-success"><?php echo _l('staff_stats_total_logged_time'); ?></h5>
                <p class="card-text text-primary fw-bold"><?php echo seconds_to_time_format($logged_time['total']); ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-info text-dark bg-white rounded">
<div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>

            <div class="card-body">
                <h5 class="card-title text-info"><?php echo _l('staff_stats_last_month_total_logged_time'); ?></h5>
                <p class="card-text text-primary fw-bold"><?php echo seconds_to_time_format($logged_time['last_month']); ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-success text-dark bg-white rounded">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>

            <div class="card-body">
                <h5 class="card-title text-success"><?php echo _l('staff_stats_this_month_total_logged_time'); ?></h5>
                <p class="card-text text-primary fw-bold"><?php echo seconds_to_time_format($logged_time['this_month']); ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-info text-dark bg-white rounded">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>

            <div class="card-body">
                <h5 class="card-title text-info"><?php echo _l('staff_stats_last_week_total_logged_time'); ?></h5>
                <p class="card-text text-primary fw-bold"><?php echo seconds_to_time_format($logged_time['last_week']); ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-success text-dark bg-white rounded">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>

            <div class="card-body">
                <h5 class="card-title text-success"><?php echo _l('staff_stats_this_week_total_logged_time'); ?></h5>
                <p class="card-text text-primary fw-bold"><?php echo seconds_to_time_format($logged_time['this_week']); ?></p>
            </div>
        </div>
    </div>
</div>


</div>