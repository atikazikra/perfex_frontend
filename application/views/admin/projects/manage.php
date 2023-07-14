<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="_buttons tw-mb-2 sm:tw-mb-4">
                    <?php if (has_permission('projects', '', 'create')) { ?>
                    <a href="<?php echo admin_url('projects/project'); ?>"
                        class="btn btn-falcon-info pull-left display-block mright5">
                        <i class="fa-regular fa-plus tw-mr-1"></i>
                        <?php echo _l('new_project'); ?>
                    </a>
                    <?php } ?>
                    <a href="<?php echo admin_url('projects/gantt'); ?>" data-toggle="tooltip"
                        data-title="<?php echo _l('project_gant'); ?>" class="btn btn-default btn-with-tooltip">
                        <i class="fa fa-align-left" aria-hidden="true"></i>
                    </a>
                    <div class="btn-group pull-right mleft4 btn-with-tooltip-group _filter_data" data-toggle="tooltip"
                        data-title="<?php echo _l('filter_by'); ?>">
                        <button type="button" class="btn btn-falcon-info dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-filter" aria-hidden="true"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-right width300">
                            <li>
                                <a href="#" data-cview="all"
                                    onclick="dt_custom_view('','.table-projects',''); return false;">
                                    <?php echo _l('expenses_list_all'); ?>
                                </a>
                            </li>
                            <?php
                  // Only show this filter if user has permission for projects view otherwise wont need this becuase by default this filter will be applied
                  if (has_permission('projects', '', 'view')) { ?>
                            <li>
                                <a href="#" data-cview="my_projects"
                                    onclick="dt_custom_view('my_projects','.table-projects','my_projects'); return false;">
                                    <?php echo _l('home_my_projects'); ?>
                                </a>
                            </li>
                            <?php } ?>
                            <li class="divider"></li>
                            <?php foreach ($statuses as $status) { ?>
                            <li class="<?php if ($status['filter_default'] == true && !$this->input->get('status') || $this->input->get('status') == $status['id']) {
                      echo 'active';
                  } ?>">
                                <a href="#" data-cview="<?php echo 'project_status_' . $status['id']; ?>"
                                    onclick="dt_custom_view('project_status_<?php echo $status['id']; ?>','.table-projects','project_status_<?php echo $status['id']; ?>'); return false;">
                                    <?php echo $status['name']; ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class=" tw-mt-2 sm:tw-mt-4 card">
                    <div class="card-body">

                        <div class="row mbot15">
                            <div class="col-md-12">
                                <h4 class="text-center text-uppercase mt-2 mb-3 text-semibold">
                                    <span>
                                        <?php echo _l('projects_summary'); ?>
                                    </span>
                                </h4>
                                <?php
                  $_where = '';
                  if (!has_permission('projects', '', 'view')) {
                      $_where = 'id IN (SELECT project_id FROM ' . db_prefix() . 'project_members WHERE staff_id=' . get_staff_user_id() . ')';
                  }
                  ?>
                            </div>
                            <div class="_filters _hidden_inputs">
    <?php
    echo form_hidden('my_projects');
    foreach ($statuses as $status) {
        $value = $status['id'];
        if ($status['filter_default'] == false && !$this->input->get('status')) {
            $value = '';
        } elseif ($this->input->get('status')) {
            $value = ($this->input->get('status') == $status['id'] ? $status['id'] : '');
        }
        echo form_hidden('project_status_' . $status['id'], $value);
        $where = ($_where == '' ? '' : $_where . ' AND ') . 'status = ' . $status['id'];
        $totalRows = total_rows(db_prefix() . 'projects', $where);
        ?>
        <div class="col-md-4 col-lg-3 col-xl-4 mb-3 col-offset-2">
            <div class="card h-100 shadow">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>
              <div class="card-body text-center">
                    <h5 class="font-weight-semibold mt-1 mb-3">
                        <?php echo $totalRows; ?>
                    </h5>
                    <p class="card-text mb-0" style="color: <?php echo $status['color']; ?>">
                        <?php echo $status['name']; ?>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

                        </div>
                        <hr class="hr-card-separator" />
                        <div class="card-table-full table-reponsive">
                            <?php echo form_hidden('custom_view'); ?>
                            <?php $this->load->view('admin/projects/table_html'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/projects/copy_settings'); ?>
<?php init_tail(); ?>
<script>
$(function() {
    var ProjectsServerParams = {};

    $.each($('._hidden_inputs._filters input'), function() {
        ProjectsServerParams[$(this).attr('name')] = '[name="' + $(this).attr('name') + '"]';
    });

    initDataTable('.table-projects', admin_url + 'projects/table', undefined, undefined, ProjectsServerParams,
        <?php echo hooks()->apply_filters('projects_table_default_order', json_encode([5, 'asc'])); ?>);

    init_ajax_search('customer', '#clientid_copy_project.ajax-search');
});
</script>
</body>

</html>