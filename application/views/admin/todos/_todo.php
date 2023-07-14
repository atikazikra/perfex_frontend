<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal" id="__todo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content ">
        <div class="modal-header">
            <h4 class="modal-title text-center mx-auto">
            <span class="edit-title hide"><?php echo _l('todo_edit_title'); ?></span>
            <span class="add-title hide"><?php echo _l('todo_add_title'); ?></span>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <?php echo form_open('admin/todo/todo', ['id' => 'add_new_todo_item']); ?>
            <div class="modal-body">
                <div class="row">
                <?php echo form_hidden('todoid', ''); ?>
                    <div class="col-md-12 h4">
                        <?php echo render_textarea('description', 'add_new_todo_description', ''); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-falcon-danger" data-dismiss="modal"><?php echo _l('close'); ?></button>
                <button type="submit" class="btn btn-falcon-success"><?php echo _l('submit'); ?></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
