<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="_buttons">
                    <?php if (has_permission('subscriptions', '', 'create')) { ?>
                    <a href="<?php echo admin_url('subscriptions/create'); ?>"
                        class="btn btn-falcon-info pull-left display-block">
                        <i class="fas fa-plus-circle mr-1"></i>
                        <?php echo _l('new_subscription'); ?>
                    </a>
                    <?php } ?>

                    <div class="btn-group pull-right mleft4 btn-with-tooltip-group _filter_data" data-toggle="tooltip"
                        data-title="<?php echo _l('filter_by'); ?>">
                        <button type="button" class="btn btn-falcon-info dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-filter" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right width300">
                            <li>
                                <a href="#" data-cview="all"
                                    onclick="dt_custom_view('','.table-subscriptions',''); return false;">
                                    <?php echo _l('all'); ?>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="<?php if (!$this->input->get('status') || $this->input->get('status') && $this->input->get('status') == 'not_subscribed') {
    echo 'active';
} ?>">
                                <a href="#" data-cview="not_subscribed"
                                    onclick="dt_custom_view('not_subscribed','.table-subscriptions','not_subscribed'); return false;">
                                    <?php echo _l('subscription_not_subscribed'); ?>
                                </a>
                            </li>
                            <?php foreach (get_subscriptions_statuses() as $status) { ?>
                            <li class="<?php if ($status['filter_default'] == true && !$this->input->get('status') || $this->input->get('status') == $status['id']) {
    echo 'active';
} ?>">
                                <a href="#" data-cview="<?php echo 'subscription_status_' . $status['id']; ?>"
                                    onclick="dt_custom_view('subscription_status_<?php echo $status['id']; ?>','.table-subscriptions','subscription_status_<?php echo $status['id']; ?>'); return false;">
                                    <?php echo _l('subscription_' . $status['id']); ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="card tw-mt-2 mt-sm-4">
                    <div class="_filters _hidden_inputs">
                        <?php
        foreach (get_subscriptions_statuses() as $status) {
            $val = '';
            if (!$this->input->get('status') || $this->input->get('status') && $this->input->get('status') == $status['id']) {
                $val = $status['id'];
            }
            if (!$this->input->get('status') && $status['id'] == 'canceled') {
                $val = '';
            }
            echo form_hidden('subscription_status_' . $status['id'], $val);
        }
        echo form_hidden('not_subscribed', !$this->input->get('status') || $this->input->get('status') && $this->input->get('status') == 'not_subscribed' ?'not_subscribed' : '');
        ?>
                    </div>


                    <div class="card-body">

                    <h4 class="mt-0 mb-2 font-weight-semibold text-uppercase text-lg text-center d-flex align-items-center justify-content-center">
                        <?php echo _l('subscriptions_summary'); ?>
                    </h4>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 mt-2">
                            <?php foreach (subscriptions_summary() as $summary) { ?>
                            <div class="col mb-2">
                                <div class="card">
                                <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-1.png);"></div>

                                    <div class="card-body text-center">
                                        <h5 class="font-weight-semibold mt-1">
                                            <?php echo $summary['total']; ?>
                                        </h5>
                                        <p class="card-text mb-0" style="color: <?php echo $summary['color']; ?>">
                                            <?php echo _l('subscription_' . $summary['id']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <hr class="hr-card-separator" />
                        <div class="card-table-full table-responsive">
                            <?php hooks()->do_action('before_subscriptions_table'); ?>
                            <?php $this->load->view('admin/subscriptions/table_html', ['url' => admin_url('subscriptions/table')]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>








    </div>
</div>
<?php init_tail(); ?>
</body>

</html>