<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="sm:tw-flex tw-space-y-3 sm:tw-space-y-0 tw-gap-6">
            <div class="sm:tw-border-r sm:tw-border-solid sm:tw-border-neutral-200 tw-pr-10 tw-w-96">
                <h4 class="mt-0 fw-normal mb-2 text-uppercase text-center">
                    <?php echo _l('sales_report_heading'); ?>
                    <i class="fas fa-file-alt ms-2"></i>

                </h4>
                <ul class="reports tw-space-y-1">
                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this, 'invoices-report'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('invoice_report'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this,'items-report'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('items_report'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this,'payments-received'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('payments_received'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this,'credit-notes'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('credit_notes_report'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this,'proposals-report'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('proposals_report'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this,'estimates-report'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('estimates_report'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this,'customers-report'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('report_sales_type_customer'); ?>
                        </a>
                    </li>
                </ul>
                
            </div>
    

            <div class="sm:tw-border-r sm:tw-border-solid sm:tw-border-neutral-200 tw-pr-10 tw-w-96">
            <h4 class="mt-0 fw-normal mb-2 text-uppercase text-center">
                    <?php echo _l('charts_based_report'); ?>
                    <i class="fas fa-chart-bar ms-2"></i>                
                </h4>
                <ul class="reports tw-space-y-1">
                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this,'total-income'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('report_sales_type_income'); ?>
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this,'payment-modes'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('payment_modes_report'); ?>
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="group tw-font-medium tw-px-3 tw-py-3 tw-text-neutral-500 hover:tw-text-neutral-800 active:tw-text-neutral-800 focus:tw-text-neutral-800 hover:tw-bg-neutral-200 tw-w-full tw-inline-flex tw-items-center tw-rounded-md data-[active=true]:tw-bg-neutral-200 data-[active=true]:tw-text-neutral-800"
                            onclick="init_report(this,'customers-group'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-mr-2.5 tw-text-neutral-500 group-hover:tw-text-neutral-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <?php echo _l('report_by_customer_groups'); ?>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tw-flex-1 tw-max-w-md">
                <?php if (isset($currencies)) { ?>
                <div id="currency" class="form-group hide">
                    <label for="currency"><i class="fa-regular fa-circle-question" data-toggle="tooltip"
                            title="<?php echo _l('report_sales_base_currency_select_explanation'); ?>"></i>
                        <?php echo _l('currency'); ?></label><br />
                    <select class="selectpicker" name="currency" data-width="100%"
                        data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
                        <?php foreach ($currencies as $currency) {
    $selected = '';
    if ($currency['isdefault'] == 1) {
        $selected = 'selected';
    } ?>
                        <option value="<?php echo $currency['id']; ?>" <?php echo $selected; ?>>
                            <?php echo $currency['name']; ?></option>
                        <?php
} ?>
                    </select>
                </div>
                <?php } ?>
                <div id="income-years" class="hide mbot15">
                    <label for="payments_years"><?php echo _l('year'); ?></label><br />
                    <select class="selectpicker" name="payments_years" data-width="100%"
                        onchange="total_income_bar_report();"
                        data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
                        <?php foreach ($payments_years as $year) { ?>
                        <option value="<?php echo $year['year']; ?>" <?php if ($year['year'] == date('Y')) {
        echo 'selected';
    } ?>>
                            <?php echo $year['year']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group hide" id="report-time">
                    <label for="months-report"><?php echo _l('period_datepicker'); ?></label><br />
                    <select class="selectpicker" name="months-report" data-width="100%"
                        data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
                        <option value=""><?php echo _l('report_sales_months_all_time'); ?>
                        </option>
                        <option value="this_month"><?php echo _l('this_month'); ?></option>
                        <option value="1"><?php echo _l('last_month'); ?></option>
                        <option value="this_year"><?php echo _l('this_year'); ?></option>
                        <option value="last_year"><?php echo _l('last_year'); ?></option>
                        <option value="3"
                            data-subtext="<?php echo _d(date('Y-m-01', strtotime('-2 MONTH'))); ?> - <?php echo _d(date('Y-m-t')); ?>">
                            <?php echo _l('report_sales_months_three_months'); ?></option>
                        <option value="6"
                            data-subtext="<?php echo _d(date('Y-m-01', strtotime('-5 MONTH'))); ?> - <?php echo _d(date('Y-m-t')); ?>">
                            <?php echo _l('report_sales_months_six_months'); ?></option>
                        <option value="12"
                            data-subtext="<?php echo _d(date('Y-m-01', strtotime('-11 MONTH'))); ?> - <?php echo _d(date('Y-m-t')); ?>">
                            <?php echo _l('report_sales_months_twelve_months'); ?></option>
                        <option value="custom"><?php echo _l('period_datepicker'); ?></option>
                    </select>
                </div>
                <div id="date-range" class="hide mbot15">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="report-from"
                                class="control-label"><?php echo _l('report_sales_from_date'); ?></label>
                            <div class="input-group date">
                                <input type="text" class="form-control datepicker" id="report-from" name="report-from">
                                <div class="input-group-addon">
                                    <i class="fa-regular fa-calendar calendar-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="report-to"
                                class="control-label"><?php echo _l('report_sales_to_date'); ?></label>
                            <div class="input-group date">
                                <input type="text" class="form-control datepicker" disabled="disabled" id="report-to"
                                    name="report-to">
                                <div class="input-group-addon">
                                    <i class="fa-regular fa-calendar calendar-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
       
        <?php if (total_rows(db_prefix() . 'invoices', ['status' => 5]) > 0) { ?>
        <p class="text-danger tw-my-3">
            <i class="fa-solid fa-circle-exclamation tw-mr-1" aria-hidden="true"></i>
            <?php echo _l('sales_report_cancelled_invoices_not_included'); ?>
        </p>
        <?php } ?>
        <div class="row">
            <div class="col-md-12 hide" id="report">
            <h4 class="mt-0 fw-normal mb-2 text-uppercase text-center">
                    <?php echo _l('reports_sales_generated_report'); ?>
                </h4>
                <div class="card">
                    <div class="card-body card-table-full">
                        <?php $this->load->view('admin/reports/includes/sales_income'); ?>
                        <?php $this->load->view('admin/reports/includes/sales_payment_modes'); ?>
                        <?php $this->load->view('admin/reports/includes/sales_customers_groups'); ?>
                        <?php $this->load->view('admin/reports/includes/sales_customers'); ?>
                        <?php $this->load->view('admin/reports/includes/sales_invoices'); ?>
                        <?php $this->load->view('admin/reports/includes/sales_credit_notes'); ?>
                        <?php $this->load->view('admin/reports/includes/sales_items'); ?>
                        <?php $this->load->view('admin/reports/includes/sales_estimates'); ?>
                        <?php $this->load->view('admin/reports/includes/sales_payments'); ?>
                        <?php $this->load->view('admin/reports/includes/sales_proposals'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
<?php $this->load->view('admin/reports/includes/sales_js'); ?>
</body>

</html>