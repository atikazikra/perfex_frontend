<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<li data-task-id="<?php echo $task['id']; ?>" class="task<?php if ($task['current_user_is_assigned']) {
    echo ' current-user-task';
} if ((!empty($task['duedate']) && $task['duedate'] < date('Y-m-d')) && $task['status'] != Tasks_model::STATUS_COMPLETE) {
    echo ' overdue-task';
} ?><?php if (!$task['current_user_is_assigned'] && $task['current_user_is_creator'] == '0' && !is_admin()) {
    echo ' not-sortable';
} ?>">
 <div class="panel-body" style="border-top: 2px solid <?php echo task_priority_color($task['priority']); ?>;">
    <div class="row">
        <div class="col-md-12 task-name" >
            <a href="<?php echo admin_url('tasks/view/' . $task['id']); ?>" onclick="init_task_modal(<?php echo $task['id']; ?>);return false;">
                <span class="inline-block full-width mtop10 tw-truncate"><?php echo $task['name']; ?></span>
            </a>
            <?php
            if ($task['rel_name']) {
                $relName = task_rel_name($task['rel_name'], $task['rel_id'], $task['rel_type']);
                $link    = task_rel_link($task['rel_id'], $task['rel_type']);

                echo '<a class="tw-text-neutral-600 tw-truncate -tw-mt-1 tw-block tw-text-sm" data-toggle="tooltip" title="' . _l('task_related_to') . '" href="' . $link . '">' . $relName . '</a>';
            }
            ?>
        </div>
        <div class="col-md-4 tw-text-neutral-600 mtop10 tw-text-sm">
            <?php echo format_members_by_ids_and_names($task['assignees_ids'], $task['assignees'], 'sm'); ?>
        </div>
        <div class="col-md-8 text-right tw-text-neutral-500 mtop10 tw-text-sm">
            <?php if ($task['total_checklist_items'] > 0) { ?>
                <span class="mright5 inline-block tw-text-neutral-500" data-toggle="tooltip" data-title="<?php echo _l('task_checklist_items'); ?>">
                    <i class="fa-regular fa-square-check"></i>
                    <?php echo $task['total_finished_checklist_items']; ?>/<?php echo $task['total_checklist_items']; ?>
                </span>
            <?php } ?>
            <span class="mright5 inline-block tw-text-neutral-500" data-toggle="tooltip" data-title="<?php echo _l('task_comments'); ?>">
                <i class="fa-regular fa-comments"></i> <?php echo $task['total_comments']; ?>
            </span>
            <span class="inline-block tw-text-neutral-500" data-toggle="tooltip" data-title="<?php echo _l('task_view_attachments'); ?>">
                <i class="fa fa-paperclip"></i> <?php echo $task['total_files']; ?>
            </span>
        </div>
    </div>
    <?php if (!empty($task['duedate'])) { ?>
        <div class="row">
            <div class="tw-text-sm col-md-12 text-right">
                <span class="tw-text-neutral-500" data-toggle="tooltip" title="<?php echo _l('task_single_due_date'); ?>">
                    <i class="fa fa-calendar-check-o"></i> <?php echo _d($task['duedate']); ?>
                </span>
            </div>
        </div>
    <?php } ?>
    <?php $tags = get_tags_in($task['id'], 'task'); ?>
    <?php if (count($tags) > 0) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="kanban-tags tw-text-sm tw-inline-flex">
                    <?php echo render_tags($tags); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
       
</li>