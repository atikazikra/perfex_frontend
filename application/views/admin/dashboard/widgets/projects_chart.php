<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="widget card" id="widget-<?php echo create_widget_id(); ?>" data-name="<?php echo _l('projects_chart'); ?>" >
   

<div class="row">
        <div class="col-md-12">
                    <div class="card">
                    <div class="card-body">
                    <div class="card-header border-0">
                        <h6 class="mb-0"><?php echo _l('home_stats_by_project_status'); ?></h6>
                    </div>
                    <hr class="my-0">
                    <div class="card-body p-0 overflow-hidden">
                        <p class="card-text tw-font-medium mb-1 tw-flex tw-items-center tw-mb-0 tw-space-x-1.5 rtl:tw-space-x-reverse tw-p-1.5">                       
                            <span class="tw-text-neutral-700"><?php // Additional text goes here ?></span>
                        </p>
                        <div class="relative" style="height:250px">
                            <canvas class="chart" height="250" id="projects_status_stats"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
