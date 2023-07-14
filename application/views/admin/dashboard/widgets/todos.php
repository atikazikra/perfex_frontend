<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="widget" id="widget-<?php echo create_widget_id(); ?>" data-name="<?php echo _l('home_my_todo_items'); ?>">
    <div class="panel_s todo-panel card h-100">
        
    <div class="card ">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-4.png);"></div>
    <div class="card-header border-0">
        <h6 class="mb-0"><?php echo _l('home_my_todo_items'); ?></h6>
    </div>
    <hr class="my-0"> <!-- Horizontal line -->

    <div class="card-body p-0  overflow-hidden">
        <?php $total_todos = count($todos); ?>
        <div class="my-3 px-x1">
            <?php foreach ($todos as $todo) { ?>
            <div class="d-flex justify-content-between hover-actions-trigger btn-reveal-trigger px-x1 hover-bg-100 py-2">
                <div class="form-check mb-0 d-flex align-items-center">
                    <?php echo form_hidden('todo_order', $todo['item_order']); ?>
                    <?php echo form_hidden('finished', 0); ?>
                    <input class="form-check-input rounded-3 form-check-line-through p-2 mt-0" type="checkbox" name="todo_id" value="<?php echo $todo['todoid']; ?>" id="crm-checkbox-todo-<?php echo $todo['todoid']; ?>">
                    <label class="form-check-label mb-0 p-3" for="crm-checkbox-todo-<?php echo $todo['todoid']; ?>">
                        <?php echo $todo['description']; ?>
                    </label>
                </div>
                <div class="d-flex align-items-center">
                    <a href="#" onclick="edit_todo_item(<?php echo $todo['todoid']; ?>); return false;" class="btn icon-item btn-outline-info rounded-3 me-2 fs--2 icon-item-sm"><span class="far fa-edit"></span></a>
                    <a href="#" onclick="delete_todo_item(this,<?php echo $todo['todoid']; ?>); return false;" class="btn icon-item btn-outline-danger rounded-3 me-2 fs--2 icon-item-sm"><span class="fas fa-window-close"></span></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-footer bg-light p-0">
        <a class="btn btn-sm btn-link d-block py-2" href="<?php echo admin_url('todo'); ?>"><span class="fas fa-plus me-1 fs--2"></span><?php echo _l('home_widget_view_all'); ?></a>
        <a class="btn btn-sm btn-link d-block py-2" href="#__todo" data-toggle="modal"><span class="fas fa-plus me-1 fs--2"></span><?php echo _l('new_todo'); ?></a>
    </div>
</div>

    <?php $this->load->view('admin/todos/_todo.php'); ?>
</div>