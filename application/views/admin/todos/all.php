<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="tw-mb-6">
                    <a href="#__todo" data-toggle="modal"
                     class="btn btn-falcon-info pull-left display-block mb-3">
                    <i class="fas fa-plus-circle tw-mr-1"></i>
  
                    <?php echo _l('new_todo'); ?>
                    </a>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                <div class="col-md-6">
                        <div class="card events animated fadeIn bg-white">
                        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-2.png);"></div>

                            <div class="card-header">
                                <h3 class="text-center text-primary font-semibold mb-1 text-capitalize">
                                <?php echo _l('unfinished_todos_title'); ?>
                                </h3>
                            </div>
                            <hr class="my-0">
                            <div class="card-body">
                                <div class="todo-body ">
                                    <div class="card-text todo unfinished-todos todos-sortable ">
                                        <?php echo _l('no_unfinished_todos_found'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="#" class="btn btn-falcon-danger unfinished-loader"><?php echo _l('load_more'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card events animated fadeIn bg-white">
                        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/falcon/img/corner-2.png);"></div>

                            <div class="card-header">
                                <h3 class="text-center text-primary font-semibold mb-1 text-capitalize">
                                     <?php echo _l('finished_todos_title'); ?>

                                </h3>
                                </div>  
                            <hr class="my-0">
                            <div class="card-body">
                                <div class="todo-body ">
                                    <div class="card-text todo unfinished-todos todos-sortable ">
                                    <?php echo _l('no_finished_todos_found'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="#" class="btn btn-falcon-danger unfinished-loader">
                                        <?php echo _l('load_more'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

            </div>
                </div>
            </div>


    </div>                                       

</div>                                   

</div>
</div>
<?php $this->load->view('admin/todos/_todo.php'); ?>
<?php init_tail(); ?>
<script>
$(function() {
    var total_pages_unfinished = '<?php echo $total_pages_unfinished; ?>';
    var total_pages_finished = '<?php echo $total_pages_finished; ?>';
    var page_unfinished = 0;
    var page_finished = 0;
    $('.unfinished-loader').on('click', function(e) {
        e.preventDefault();
        if (page_unfinished <= total_pages_unfinished) {
            $.post(window.location.href, {
                finished: 0,
                todo_page: page_unfinished
            }).done(function(response) {
                response = JSON.parse(response);
                if (response.length == 0) {
                    $('.unfinished-todos .no-todos').removeClass('hide');
                }

                $.each(response, function(i, obj) {
                    $('.unfinished-todos').append(render_li_items(0, obj));
                });
                page_unfinished++;
            });

            if (page_unfinished >= total_pages_unfinished - 1) {
                $(".unfinished-loader").addClass("disabled");
            }
        }
    });

    $('.finished-loader').on('click', function(e) {
        e.preventDefault();
        if (page_finished <= total_pages_finished) {
            $.post(window.location.href, {
                finished: 1,
                todo_page: page_finished
            }).done(function(response) {
                response = JSON.parse(response);

                if (response.length == 0) {
                    $('.finished-todos .no-todos').removeClass('hide');
                }
                $.each(response, function(i, obj) {
                    $('.finished-todos').append(render_li_items(1, obj));
                });

                page_finished++;
            });

            if (page_finished >= total_pages_finished - 1) {
                $(".finished-loader").addClass("disabled");
            }
        }
    });
    $('.unfinished-loader').click();
    $('.finished-loader').click();
});

function render_li_items(finished, obj) {
    var todo_finished_class = '';
    var checked = '';
    if (finished == 1) {
        todo_finished_class = ' line-throught';
        checked = 'checked';
    }
    return '<li><div class="media"><div class="media-left no-padding-right"><div class="dragger todo-dragger"></div> <input type="hidden" value="' +
        finished + '" name="finished"><input type="hidden" value="' + obj.item_order +
        '" name="todo_order"><div class="checkbox checkbox-default todo-checkbox"><input type="checkbox" name="todo_id" value="' +
        obj.todoid + '" ' + checked +
        '><label></label></div></div> <div class="media-body"><p class="todo-description' + todo_finished_class +
        ' no-padding-left">' + obj.description + '<a href="#" onclick="delete_todo_item(this,' + obj.todoid +
        '); return false;" class="pull-right m-1 text-danger "><i class="fas fa-window-close"></i></a><a href="#" onclick="edit_todo_item(' +
        obj.todoid +
        '); return false;" class="pull-right m-1 text-danger mright5"><i class="far fa-edit"></i></a></p><span class="todo-date tw-text-sm tw-text-neutral-500">' +
        obj.dateadded + '</span></div></div></li>';
}
</script>
</body>

</html>
