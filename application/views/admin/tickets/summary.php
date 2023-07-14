<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
    <?php
 $statuses = $this->tickets_model->get_ticket_status();
 ?>
    <div class="_filters _hidden_inputs hidden tickets_filters">
        <?php
  echo form_hidden('my_tickets');
  echo form_hidden('merged_tickets');
  if (is_admin()) {
      $ticket_assignees = $this->tickets_model->get_tickets_assignes_disctinct();
      foreach ($ticket_assignees as $assignee) {
          echo form_hidden('ticket_assignee_' . $assignee['assigned']);
      }
  }
  foreach ($statuses as $status) {
      $val = '';
      if ($chosen_ticket_status != '') {
          if ($chosen_ticket_status == $status['ticketstatusid']) {
              $val = $chosen_ticket_status;
          }
      } else {
          if (in_array($status['ticketstatusid'], $default_tickets_list_statuses)) {
              $val = 1;
          }
      }
      echo form_hidden('ticket_status_' . $status['ticketstatusid'], $val);
  } ?>
    </div>
    <div class="col-md-12">
    <h3 class="mt-1 mb-3 font-semibold text-monospace text-uppercase text-lg text-center">
            <span>
                <?php echo _l('tickets_summary'); ?>
            </span>
        </h4>
    </div>
    <?php
  $where = '';
  if (!is_admin()) {
      if (get_option('staff_access_only_assigned_departments') == 1) {
          $departments_ids = [];
          if (count($staff_deparments_ids) == 0) {
              $departments = $this->departments_model->get();
              foreach ($departments as $department) {
                  array_push($departments_ids, $department['departmentid']);
              }
          } else {
              $departments_ids = $staff_deparments_ids;
          }
          if (count($departments_ids) > 0) {
              $where = 'AND department IN (SELECT departmentid FROM ' . db_prefix() . 'staff_departments WHERE departmentid IN (' . implode(',', $departments_ids) . ') AND staffid="' . get_staff_user_id() . '")';
          }
      }
  }
 foreach ($statuses as $status) {
    $_where = '';
    if ($where == '') {
        $_where = 'status=' . $status['ticketstatusid'];
    } else {
        $_where = 'status=' . $status['ticketstatusid'] . ' ' . $where;
    }
    if (isset($project_id)) {
        $_where = $_where . ' AND project_id=' . $project_id;
    }
    $_where = $_where . ' AND merged_ticket_id IS NULL';
?>

    <div class="mb-2 col-md-3 col-xs-6 border-right border-solid border-neutral-300  <?php if ($status === end($statuses)) { echo 'border-right-0'; } ?>">
        <div class="card text-center">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>
            <div class="card-body">
                <h5 class="font-weight-semibold mt-1"><?php echo total_rows(db_prefix() . 'tickets', $_where); ?></h5>
                <p class="card-text mb-0" style="color: <?php echo $status['statuscolor']; ?>"><?php echo ticket_status_translate($status['ticketstatusid']); ?></p>
            </div>
        </div>
    </div>
<?php } ?>
</div>