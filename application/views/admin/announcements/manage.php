<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if (is_admin()) { ?>
                <a href="<?php echo admin_url('announcements/announcement'); ?>"
                    class="btn btn-falcon-info tw-mb-2 sm:tw-mb-4">
                    <i class="fas fa-plus-circle tw-mr-1"></i>
                    <?php echo _l('new_announcement'); ?>
                </a>
                <?php } else { ?>
                <h4 class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700 text-center mb-2 text-uppercase ">
                    <?php echo _l('announcements'); ?>
                </h4>
                <?php } ?>
                <div class="card">
                <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-2.png);"></div>
                    <div class="card-body card-table-full table-responsive">
                        <?php render_datatable([_l('name'), _l('announcement_date_list')], 'announcements'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php init_tail(); ?>
    </body>

    </html>