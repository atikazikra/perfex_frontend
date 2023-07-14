<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-7">
            <h4 class="mt-0 font-semibold text-lg text-center text-uppercase text-muted mb-2"><?php echo $announcement->name; ?>
                    <?php if (is_admin()) { ?>
                    <a href="<?php echo admin_url('announcements/announcement/' . $announcement->announcementid); ?>"
                        class="pull-right tw-font-normal">
                        <small><?php echo _l('edit'); ?>
                        <i class="fas fa-edit"></i>
                    </small>
                    </a>
                    <?php } ?>
                </h4>
                <div class="card mb-3">

                    <div class="card-body ">
                        <p class="tw-text-neutral-500 tw-mb-0">
                            <?php echo _l('announcement_date', _dt($announcement->dateadded)); ?></p>
                        <?php if ($announcement->showname == 1) { ?>
                        <p class="tw-text-neutral-500">
                            <?php echo _l('announcement_from') . ' ' . $announcement->userid; ?></p>
                        <?php } ?>
                        <?php echo $announcement->message; ?>
                    </div>
                </div>
            </div>
            <?php if (count($recent_announcements) > 0) { ?>
                <div class="col-md-5">

                <h4 class="mt-0 font-semibold text-lg text-center text-uppercase text-muted mb-2">
                            <?php echo _l('announcements_recent'); ?>
                    </h4>
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($recent_announcements as $announcement) { ?>
                            <a class="font-weight-bold"
                                href="<?php echo admin_url('announcements/view/' . $announcement['announcementid']); ?>">
                                <?php echo $announcement['name']; ?>
                            </a>
                            <p class="text-muted mb-1">
                                <?php echo _l('announcement_date', _dt($announcement['dateadded'])); ?>
                            </p>
                            <?php if ($announcement['showname'] == 1) { ?>
                            <p class="text-muted mb-1">
                                <?php echo _l('announcement_from') . ' ' . $announcement['userid']; ?>
                            </p>
                            <?php } ?>
                            <div class="mt-3">
                                <?php echo strip_tags(mb_substr($announcement['message'], 0, 250)) . '...'; ?>
                                <hr class="card-separator" />
                            </div>
                            <?php } ?>
                        </div>
                    </div>
    <?php } ?>
</div>

        </div>
    </div>
    <?php init_tail(); ?>
    </body>

    </html>
