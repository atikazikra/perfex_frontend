<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div id="stats-top" class="hide">
    <div id="estimates_total"></div>

    <div class="_filters _hidden_inputs hidden">
        <?php
            if (isset($estimates_sale_agents)) {
                foreach ($estimates_sale_agents as $agent) {
                    echo form_hidden('sale_agent_' . $agent['sale_agent']);
                }
            }
            if (isset($estimate_statuses)) {
                foreach ($estimate_statuses as $_status) {
                    $val = '';
                    if ($_status == $this->input->get('status')) {
                        $val = $_status;
                    }
                    echo form_hidden('estimates_' . $_status, $val);
                }
            }
            if (isset($estimates_years)) {
                foreach ($estimates_years as $year) {
                    echo form_hidden('year_' . $year['year'], $year['year']);
                }
            }
            echo form_hidden('not_sent', $this->input->get('filter'));
            echo form_hidden('project_id');
            echo form_hidden('invoiced');
            echo form_hidden('not_invoiced');
            ?>
    </div>
    <div class="quick-top-stats">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 mt-5 mb-0">
        <?php foreach ($estimate_statuses as $status) {
            $percent_data = get_estimates_percent_by_status(
                $status,
                (isset($project) ? $project->id : null)
            ); ?>
        <div class="col">
            
            <div class="p-4 border border-1 rounded">                
                <dt class="fw-bold text-<?php echo estimate_status_color_class($status); ?>">
                    <?php echo format_estimate_status($status, '', false); ?>
                </dt>
                <dd class="mt-1 d-flex flex-column flex-lg-row justify-content-between align-items-baseline">
                    <div class="d-flex align-items-baseline">
                        <?php echo $percent_data['total_by_status']; ?> / <?php echo $percent_data['total']; ?>
                        <span class="ms-2 text-muted small">
                            <a href="#" data-cview="estimates_<?php echo $status; ?>"
                                onclick="dt_custom_view('estimates_<?php echo $status; ?>','.table-estimates','estimates_<?php echo $status; ?>',true); return false;">
                                <?php echo _l('view'); ?>
                            </a>
                        </span>
                    </div>
                    <div class="fw-medium mt-2 mt-lg-0">
                        <?php echo $percent_data['percent']; ?>%
                    </div>
                </dd>
            </div>
        </div>
        <?php
        } ?>
    </div>
</div>


    <hr />
</div>