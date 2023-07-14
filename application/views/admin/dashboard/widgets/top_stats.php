<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="widget relative" id="widget-<?php echo create_widget_id(); ?>" data-name="<?php echo _l('quick_stats'); ?>">
    <div class="widget-dragger"></div>
    <div class="row">
        <?php
         $initial_column = 'col-lg-3';
         if (!is_staff_member() && ((!has_permission('invoices', '', 'view') && !has_permission('invoices', '', 'view_own') && (get_option('allow_staff_view_invoices_assigned') == 0
           || (get_option('allow_staff_view_invoices_assigned') == 1 && !staff_has_assigned_invoices()))))) {
             $initial_column = 'col-lg-6';
         } elseif (!is_staff_member() || (!has_permission('invoices', '', 'view') && !has_permission('invoices', '', 'view_own') && (get_option('allow_staff_view_invoices_assigned') == 1 && !staff_has_assigned_invoices()) || (get_option('allow_staff_view_invoices_assigned') == 0 && (!has_permission('invoices', '', 'view') && !has_permission('invoices', '', 'view_own'))))) {
             $initial_column = 'col-lg-4';
         }
      ?>
   
        </div>

        <?php if (is_staff_member()) { ?>
    <div class="quick-stats-leads col-xs-12 col-md-6 col-sm-6 mb-3 col-lg-4 <?php echo $initial_column; ?> tw-mb-2 sm:tw-mb-0">
        <div class="card overflow-hidden top_stats_wrapper" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(../assets/falcon/img/corner-1.png);"></div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6><?php echo _l('leads_converted_to_client'); ?><span class="badge badge-subtle-warning rounded-pill ms-2"></span></h6>
                <div class="display-4 fs-3 mb-2 fw-normal font-sans-serif text-warning">
                    <?php
                    $where = '';
                    if (!is_admin()) {
                        $where .= '(addedfrom = ' . get_staff_user_id() . ' OR assigned = ' . get_staff_user_id() . ')';
                    }
                    // Junk leads are excluded from total
                    $total_leads = total_rows(db_prefix() . 'leads', ($where == '' ? 'junk=0' : $where .= ' AND junk =0'));
                    if ($where == '') {
                        $where .= 'status=1';
                    } else {
                        $where .= ' AND status =1';
                    }
                    $total_leads_converted = total_rows(db_prefix() . 'leads', $where);
                    $percent_total_leads_converted = ($total_leads > 0 ? number_format(($total_leads_converted * 100) / $total_leads, 2) : 0);
                    echo $total_leads_converted . ' / ' . $total_leads;
                    ?>
                </div>
                <div class="progress tw-mb-0 tw-mt-4 progress-bar-mini">
                    <div class="progress-bar progress-bar-success no-percent-text not-dynamic" role="progressbar"
                        aria-valuenow="<?php echo $percent_total_leads_converted; ?>" aria-valuemin="0"
                        aria-valuemax="100" style="width: 0%"
                        data-percent="<?php echo $percent_total_leads_converted; ?>">
                    </div>
                </div>
            </div>
        </div>
   
    </div>

<?php } ?>


<div class="quick-stats-projects col-xs-12 col-md-6 col-sm-6 col-lg-4 <?php echo $initial_column; ?> tw-mb-2 sm:tw-mb-0">
    <div class="card overflow-hidden top_stats_wrapper" style="min-width: 12rem">
        <div class="bg-holder bg-card" style="background-image:url(../assets/falcon/img/corner-1.png);"></div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
            <h6>
                <?php
                $_where         = '';
                $project_status = get_project_status_by_id(2);
                if (!has_permission('projects', '', 'view')) {
                    $_where = 'id IN (SELECT project_id FROM ' . db_prefix() . 'project_members WHERE staff_id=' . get_staff_user_id() . ')';
                }
                $total_projects               = total_rows(db_prefix() . 'projects', $_where);
                $where                        = ($_where == '' ? '' : $_where . ' AND ') . 'status = 2';
                $total_projects_in_progress   = total_rows(db_prefix() . 'projects', $where);
                $percent_in_progress_projects = ($total_projects > 0 ? number_format(($total_projects_in_progress * 100) / $total_projects, 2) : 0);
                echo _l('projects') . ' ' . $project_status['name'];
                ?>
                <span class="badge badge-subtle-warning rounded-pill ms-2"></span>
            </h6>
            <div class="display-4 fs-3 mb-2 fw-normal font-sans-serif text-warning">
                <?php echo $total_projects_in_progress; ?> / <?php echo $total_projects; ?>
            </div>
            <div class="progress tw-mb-0 tw-mt-5 progress-bar-mini">
                <div class="progress-bar no-percent-text not-dynamic" style="background:<?php echo $project_status['color']; ?>" role="progressbar"
                    aria-valuenow="<?php echo $percent_in_progress_projects; ?>" aria-valuemin="0"
                    aria-valuemax="100" style="width: 0%" data-percent="<?php echo $percent_in_progress_projects; ?>"></div>
            </div>
        </div>
    </div>
</div>

<div class="quick-stats-tasks col-xs-12 col-md-6 col-sm-6 col-lg-4 <?php echo $initial_column; ?>">
    <div class="card overflow-hidden top_stats_wrapper">
        <div class="bg-holder bg-card" style="background-image:url(../assets/falcon/img/corner-1.png);"></div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
            <h6>
                <?php
                $_where                      = '';
                if (!has_permission('tasks', '', 'view')) {
                    $_where = db_prefix() . 'tasks.id IN (SELECT taskid FROM ' . db_prefix() . 'task_assigned WHERE staffid = ' . get_staff_user_id() . ')';
                }
                $total_tasks                = total_rows(db_prefix() . 'tasks', $_where);
                $where                      = ($_where == '' ? '' : $_where . ' AND ') . 'status != ' . Tasks_model::STATUS_COMPLETE;
                $total_not_finished_tasks   = total_rows(db_prefix() . 'tasks', $where);
                $percent_not_finished_tasks = ($total_tasks > 0 ? number_format(($total_not_finished_tasks * 100) / $total_tasks, 2) : 0);
                echo _l('tasks_not_finished');
                ?>
            </h6>
            <div class="display-4 fs-3 mb-2 fw-normal font-sans-serif text-warning">
                <?php echo $total_not_finished_tasks; ?> / <?php echo $total_tasks; ?>
            </div>
            <div class="progress tw-mb-0 tw-mt-4 progress-bar-mini">
                <div class="progress-bar progress-bar-default no-percent-text not-dynamic" role="progressbar"
                    aria-valuenow="<?php echo $percent_not_finished_tasks; ?>" aria-valuemin="0" aria-valuemax="100"
                    style="width: 0%" data-percent="<?php echo $percent_not_finished_tasks; ?>"></div>
            </div>
        </div>
    </div>
</div>
        
    </div>
</div>