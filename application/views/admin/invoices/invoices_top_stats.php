<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div id="stats-top" class="hide">
    <div id="invoices_total"></div>

    <?php
      $where_all           = '';
      $has_permission_view = has_permission('invoices', '', 'view');
      if (isset($project)) {
          $where_all .= 'project_id=' . $project->id . ' AND ';
      }
      if (!$has_permission_view) {
          $where_all .= get_invoices_where_sql_for_staff(get_staff_user_id());
      }
      $where_all = trim($where_all);
      if (endsWith($where_all, ' AND')) {
          $where_all = substr_replace($where_all, '', -4);
      }
      $total_invoices = total_rows(db_prefix() . 'invoices', $where_all);
      ?>
    <div class="quick-top-stats">
   <div class="container my-4">
    <div class="row">
        <?php foreach ($invoices_statuses as $status) {
            if ($status == Invoices_model::STATUS_CANCELLED) {
                continue;
            }

            $where = ['status' => $status];
            if (isset($project)) {
                $where['project_id'] = $project->id;
            }
            if (!$has_permission_view) {
                $where['addedfrom'] = get_staff_user_id();
            }
            $total_by_status = total_rows(db_prefix() . 'invoices', $where);
            $percent         = ($total_invoices > 0 ? number_format(($total_by_status * 100) / $total_invoices, 2) : 0); ?>
        
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-2">
        <div class="card h-auto shadow-sm">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>
    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center p-2">
        <h5 class="card-title text-<?php echo get_invoice_status_label($status); ?> mb-2 font-weight-bold"><?php echo format_invoice_status($status, '', false); ?></h5>
        <div class="d-flex justify-content-between w-100 mb-1 mx-2 mx-md-3 mx-lg-5">
    <p class="card-text text-muted"><?php echo $total_by_status; ?> / <?php echo $total_invoices; ?></p>
    <p class="card-text text-muted"><?php echo $percent; ?>%</p>
</div>

        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-link" data-cview="invoices_<?php echo $status; ?>"
               onclick="dt_custom_view('invoices_<?php echo $status; ?>','.table-invoices','invoices_<?php echo $status; ?>',true); return false;">
                <?php echo _l('view'); ?>
            </a>
        </div>
    </div>
</div>

        </div>
        <?php
        } ?>
    </div>
</div>

</div>


    </div>
    <hr />
