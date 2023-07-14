<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h3 class="mt-1 mb-3 font-semibold text-monospace text-uppercase text-lg text-center">
    <span>
        <?php echo _l('tasks_summary'); ?>
    </span>
</h3>
<div class="row">
    <?php foreach (tasks_summary_data((isset($rel_id) ? $rel_id : null), (isset($rel_type) ? $rel_type : null)) as $summary) { ?>
        <div class="col-md-4 mb-2 col-xs-6">
            <div class="card card-shadow ">
                <div class="card-body card-title">
                <h5 class="font-weight-bold mt-1 text-center text-uppercase">
                        <?php echo $summary['name']; ?>
                    </h5>
                    <div class="d-flex">
                        <span class="font-weight-semibold me-3">
                            <?php echo $summary['total_tasks']; ?>
                        </span>
                        <span style="color: <?php echo $summary['color']; ?>">
                            <?php echo $summary['name']; ?>
                        </span>
                    </div>
                    <p class="card-text text-sm mb-0 text-muted">
                        <?php echo _l('tasks_view_assigned_to_user'); ?>: <?php echo $summary['total_my_tasks']; ?>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<hr class="hr-panel-separator" />