<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if (has_permission('items', '', 'delete')) { ?>
                <a href="#" data-toggle="modal" data-table=".table-invoice-items" data-target="#items_bulk_actions"
                    class="hide bulk-actions-btn table-btn"><?php echo _l('bulk_actions'); ?></a>
                    <div class="modal bulk_actions" id="items_bulk_actions" tabindex="-1" role="dialog" aria-labelledby="itemsBulkActionsLabel" aria-modal="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
    <h5 class="modal-title mx-auto" id="itemsBulkActionsLabel"><?php echo _l('bulk_actions'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

            <div class="modal-body">
                <?php if (has_permission('items', '', 'delete')) { ?>
                <div class="form-check form-check-danger">
                    <input type="checkbox" class="form-check-input" name="mass_delete" id="mass_delete">
                    <label class="form-check-label" for="mass_delete"><?php echo _l('mass_delete'); ?></label>
                </div>
                <!-- <hr class="mass_delete_separator" /> -->
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-falcon-danger" data-bs-dismiss="modal"><?php echo _l('close'); ?></button>
                <a href="#" class="btn btn-falcon-success" onclick="items_bulk_action(this); return false;"><?php echo _l('confirm'); ?></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

                <!-- /.modal -->
                <?php } ?>

                <?php hooks()->do_action('before_items_page_content'); ?>

                <?php if (has_permission('items', '', 'create')) { ?>
                    <div class="d-flex mb-2 justify-content-start flex-wrap">
                <a href="#" class="btn btn-falcon-info me-2" data-bs-toggle="modal" data-bs-target="#sales_item_modal">
                    <i class="fas fa-plus-circle me-1"></i>
                    <?php echo _l('new_invoice_item'); ?>
                </a>
                <a href="<?php echo admin_url('invoice_items/import'); ?>" class="btn btn-falcon-info me-2">
                    <i class="fas fa-upload me-1"></i>
                    <?php echo _l('import_items'); ?>
                </a>
                <a href="#" class="btn btn-falcon-info me-2" data-bs-toggle="modal" data-bs-target="#groups">
                    <i class="fas fa-layer-group me-1"></i>
                    <?php echo _l('item_groups'); ?>
                </a>
            </div>

                <div class="clearfix"></div>
                <?php } ?>
                <div class="card-table-full">

                    <div class="card">
                        <div class="card-body">

                            <?php
    $table_data = [];

    if (has_permission('items', '', 'delete')) {
        $table_data[] = '<span class="hide"> - </span><div class="checkbox mass_select_all_wrap"><input type="checkbox" id="mass_select_all" data-to-table="invoice-items"><label></label></div>';
    }

    $table_data = array_merge($table_data, [
      _l('invoice_items_list_description'),
      _l('invoice_item_long_description'),
      _l('invoice_items_list_rate'),
      _l('tax_1'),
      _l('tax_2'),
      _l('unit'),
      _l('item_group_name'), ]);

    $cf = get_custom_fields('items');
    foreach ($cf as $custom_field) {
        array_push($table_data, [
       'name'     => $custom_field['name'],
       'th_attrs' => ['data-type' => $custom_field['type'], 'data-custom-field' => 1],
     ]);
    }
    render_datatable($table_data, 'invoice-items'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/invoice_items/item'); ?>
<div class="modal" id="groups" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
    <h4 class="modal-title mx-auto text-uppercase" id="exampleModalLabel">
        <?php echo _l('item_groups'); ?>
    </h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

</div>

            <div class="modal-body">
                <?php if (has_permission('items', '', 'create')) { ?>
                <div class="input-group mb-3">
                    <input type="text" name="item_group_name" id="item_group_name" class="form-control"
                        placeholder="<?php echo _l('item_group_name'); ?>">
                    <button class="btn btn-info" type="button" id="new-item-group-insert">
                        <?php echo _l('new_item_group'); ?>
                    </button>
                </div>
                <hr />
                <?php } ?>
                <div class="row">
                    <div class="container-fluid">
                        <table class="table dt-table table-items-groups table-responsive" data-order-col="1" data-order-type="asc">
                            <thead>
                                <tr>
                                    <th><?php echo _l('id'); ?></th>
                                    <th><?php echo _l('item_group_name'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items_groups as $group) { ?>
                                <tr class="row-has-options" data-group-row-id="<?php echo $group['id']; ?>">
                                    <td data-order="<?php echo $group['id']; ?>"><?php echo $group['id']; ?></td>
                                    <td data-order="<?php echo $group['name']; ?>">
                                        <span class="group_name_plain_text"><?php echo $group['name']; ?></span>
                                        <div class="group_edit d-none">
                                            <div class="input-group">
                                                <input type="text" class="form-control">
                                                <button class="btn btn-primary update-item-group"
                                                    type="button"><?php echo _l('submit'); ?></button>
                                            </div>
                                        </div>
                                        <div class="row-options">
                                            <?php if (has_permission('items', '', 'edit')) { ?>
                                            <a href="#" class="edit-item-group text-decoration-none">
                                                <?php echo _l('edit'); ?>
                                            </a>
                                            <?php } ?>
                                            <?php if (has_permission('items', '', 'delete')) { ?>
                                            | <a href="<?php echo admin_url('invoice_items/delete_group/' . $group['id']); ?>"
                                                class="delete-item-group _delete text-danger text-decoration-none">
                                                <?php echo _l('delete'); ?>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-falcon-danger" data-bs-dismiss="modal"><?php echo _l('close'); ?></button>
            </div>
        </div>
    </div>
</div>

<?php init_tail(); ?>
<script>
$(function() {

    var notSortableAndSearchableItemColumns = [];
    <?php if (has_permission('items', '', 'delete')) { ?>
    notSortableAndSearchableItemColumns.push(0);
    <?php } ?>


    <?php if ($this->input->get('id')) { ?>
    var id = "<?php echo $this->input->get('id') ?>";
    if (typeof(id) !== 'undefined') {
        var $itemModal = $('#sales_item_modal');
        $('input[name="itemid"]').val(id);
        requestGetJSON('invoice_items/get_item_by_id/' + id).done(function(response) {
            $itemModal.find('input[name="description"]').val(response.description);
            $itemModal.find('textarea[name="long_description"]').val(response.long_description.replace(
                /(<|<)br\s*\/*(>|>)/g, " "));
            $itemModal.find('input[name="rate"]').val(response.rate);
            $itemModal.find('input[name="unit"]').val(response.unit);
            $('select[name="tax"]').selectpicker('val', response.taxid).change();
            $('select[name="tax2"]').selectpicker('val', response.taxid_2).change();
            $itemModal.find('#group_id').selectpicker('val', response.group_id);
            $.each(response, function(column, value) {
                if (column.indexOf('rate_currency_') > -1) {
                    $itemModal.find('input[name="' + column + '"]').val(value);
                }
            });

            $('#custom_fields_items').html(response.custom_fields_html);

            init_selectpicker();
            init_color_pickers();
            init_datepicker();

            $itemModal.find('.add-title').addClass('hide');
            $itemModal.find('.edit-title').removeClass('hide');
            validate_item_form();
        });
        $itemModal.modal('show');
    }
    <?php } ?>

    initDataTable('.table-invoice-items', admin_url + 'invoice_items/table',
        notSortableAndSearchableItemColumns, notSortableAndSearchableItemColumns, 'undefined', [1, 'asc']);

    if (get_url_param('groups_modal')) {
        // Set time out user to see the message
        setTimeout(function() {
            $('#groups').modal('show');
        }, 1000);
    }

    $('#new-item-group-insert').on('click', function() {
        var group_name = $('#item_group_name').val();
        if (group_name != '') {
            $.post(admin_url + 'invoice_items/add_group', {
                name: group_name
            }).done(function() {
                window.location.href = admin_url + 'invoice_items?groups_modal=true';
            });
        }
    });

    $('body').on('click', '.edit-item-group', function(e) {
        e.preventDefault();
        var tr = $(this).parents('tr'),
            group_id = tr.attr('data-group-row-id');
        tr.find('.group_name_plain_text').toggleClass('hide');
        tr.find('.group_edit').toggleClass('hide');
        tr.find('.group_edit input').val(tr.find('.group_name_plain_text').text());
    });

    $('body').on('click', '.update-item-group', function() {
        var tr = $(this).parents('tr');
        var group_id = tr.attr('data-group-row-id');
        name = tr.find('.group_edit input').val();
        if (name != '') {
            $.post(admin_url + 'invoice_items/update_group/' + group_id, {
                name: name
            }).done(function() {
                window.location.href = admin_url + 'invoice_items';
            });
        }
    });
});

function items_bulk_action(event) {
    if (confirm_delete()) {
        var mass_delete = $('#mass_delete').prop('checked');
        var ids = [];
        var data = {};

        if (mass_delete == true) {
            data.mass_delete = true;
        }

        var rows = $('.table-invoice-items').find('tbody tr');
        $.each(rows, function() {
            var checkbox = $($(this).find('td').eq(0)).find('input');
            if (checkbox.prop('checked') === true) {
                ids.push(checkbox.val());
            }
        });
        data.ids = ids;
        $(event).addClass('disabled');
        setTimeout(function() {
            $.post(admin_url + 'invoice_items/bulk_action', data).done(function() {
                window.location.reload();
            }).fail(function(data) {
                alert_float('danger', data.responseText);
            });
        }, 200);
    }
}
</script>
</body>

</html>