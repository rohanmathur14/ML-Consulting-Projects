<?php require_once ADMINVIEWPATH.'includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css"/>
<style type="text/css">
    .form-group.has-error .select2-selection{border: 1px solid #b94a48;}
    .form-group.has-success .select2-selection{border: 1px solid #468847;}
    #elementData .pd10{padding: 0px 15px;}
</style>
<body>
<!-- HEADER -->
<?php require_once ADMINVIEWPATH.'includes/inner_header.php'; ?>
<!--/HEADER -->
<!-- PAGE -->
<section id="page">
    <!-- SIDEBAR -->
    <?php require_once ADMINVIEWPATH.'includes/sidebar.php'; ?>
    <!-- /SIDEBAR -->
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div id="content" class="col-lg-12">
                    <!-- PAGE HEADER-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header">
                                <!-- BREADCRUMBS -->
                                <ul class="breadcrumb">
                                    <li>
                                        <i class="fa fa-home"></i>
                                        <a href="<?php echo $site_path['admin_url']; ?>">Home</a>
                                    </li>
                                    <li><a href="<?php echo $site_path['admin_url']; ?>/inventory">Inventory</a> </li>
                                    <li><a href="<?php echo $site_path['admin_url']; ?>/inventory/outward">Outward</a> </li>
                                    <li><a href="<?php echo $site_path['admin_url']; ?>/inventory/indent_request">Indent Request</a> </li>
                                    <li><?php echo $pageBreadCrumbs; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                    <!-- USER PROFILE -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $this->view('admin/includes/messagefile'); ?>
                                </div>
                            </div>
                            <!-- BOX -->
                            <div class="box border">
                                <div class="box-title">
                                    <h4><i class="fa fa-cogs fa-fw"></i><span class="hidden-inline-mobile"><?php echo $pageBreadCrumbs; ?></span></h4>
                                </div>
                            <div>
                                <div class="tabbable header-tabs user-profile">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="javascript:void(0);"><i class="fa fa-dot-circle-o"></i><span class="hidden-inline-mobile"><?php echo $pageBreadCrumbs; ?></span></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- OVERVIEW -->
                                        <div class="tab-pane fade in active" id="personal_information">
                                            <div class="box-body ">
                                                <form enctype="multipart/form-data" method="post" name="addIndent" id="addIndent" action="<?php echo $site_path['admin_url']; ?>inventory/make_indent_request/<?php echo !empty($selectedProject['id']) ? $selectedProject['id'] : '';?>"  class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Project</label>
                                                        <div class="col-md-7">
                                                            <select name="project_id" id="project_id" class="form-control select2">
                                                                <option value="">Select</option>
                                                                <?php if(!empty($projects)){foreach($projects as $project){?>
                                                                    <option value="<?php echo $project['id'];?>" <?php if(!empty($selectedProject) && $selectedProject['id']==$project['id']){?>selected="selected"<?php } ?>><?php echo $project['name'];?></option>
                                                                <?php }} ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Name of Site Incharge</label>
                                                        <div class="col-md-3">
                                                            <input type="text" name="site_incharge" id="site_incharge" class="form-control" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Work Site</label>
                                                        <div class="col-md-3">
                                                            <input type="text" name="work_site" id="work_site" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <?php $i=0; if(!empty($selectedProject)){?>
                                                    <div class="form-group" id="elementData">
                                                        <div class="col-md-12">
                                                            <table class="table  table-bordered">
                                                                <thead style="background: #116bc4;color: #fff;">
                                                                <tr>
                                                                    <th width="40%">Description of Material</th>
                                                                    <th width="15%">Unit</th>
                                                                    <th width="15%">Quantity</th>
                                                                    <th width="20%">Remarks</th>
                                                                    <th width="10%">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr id="row<?php echo $i;?>" data-id="<?php echo $i;?>">
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <div class="pd10">
                                                                                <select name="request[<?php echo $i;?>][item_description_ele]" id="item_description_ele" class="form-control select2 item_description_ele">
                                                                                    <option value="">Select</option>
                                                                                    <?php if(!empty($selectedProject) && !empty($selectedProject['items'])){foreach($selectedProject['items'] as $item){?>
                                                                                        <option value="<?php echo $item['id'];?>"><?php echo $item['item_description'];?></option>
                                                                                    <?php }} ?>
                                                                                </select>
                                                                                <input type="hidden" name="request[<?php echo $i;?>][item_description_id]" class="form-control item_description_id" >
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <div class="pd10">
                                                                                <div class="unit_type">N/A</div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <div class="pd10">
                                                                                <input type="text" name="request[<?php echo $i;?>][quantity]" class="form-control quantity number" >
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <div class="pd10">
                                                                                <textarea name="request[<?php echo $i;?>][remarks]" class="form-control remarks" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-success btn-add" type="button">
                                                                                <i class="fa fa-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <?php } ?>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">&nbsp;</label>
                                                        <div class="col-md-6"> <input type="submit" class="btn btn-primary" value="Submit" name="addUser"></div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /USER PROFILE -->
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="footer-tools">
                            <span class="go-top">
                                <i class="fa fa-chevron-up"></i> Top
                            </span>
                        </div>

                    </div><!-- /CONTENT-->
                </div>
            </div>
        </div>
</section>
<!--/PAGE -->
<?php require_once ADMINVIEWPATH.'includes/footer.php'; ?>

<script type="text/javascript" src="<?php echo JS_PATH; ?>admin/select2/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH; ?>admin/select2/select2.min.css" id="skin-switcher">

<script type="text/javascript" src="<?php echo JS_PATH; ?>uploads.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.setPage("AddAdminUser");

        $(".select2").select2();
        $(".item_description_ele").select2();

        var unit_types = {};
        var mr_html = '<option value="">Select</option>';
        <?php if(!empty($selectedProject) && !empty($selectedProject['items'])){foreach($selectedProject['items'] as $item){?>
        mr_html+= '<option value="<?php echo $item['id'];?>"><?php echo addslashes($item['item_description']);?></option>';
        unit_types[<?php echo $item['id'];?>] = "<?php echo addslashes($item['unit_type_name']);?>";
        <?php }} ?>

        /*$('#project_id').change(function(){
            if($(this).val()>0)
                {
                    window.location.href = '<?php //echo BASE_URL;?>admin/inventory/make_indent_request/'+$(this).val();
                }
        });*/

        $('#project_id').on('select2:select', function (e) {
            var data = e.params.data;
            if(data.id>0)
            {
                ajaxLoaderStart();
                window.location.href = '<?php echo BASE_URL;?>admin/inventory/make_indent_request/'+$(this).val();
            }
        });

        var validatorNumric = {
            validators: {
                notEmpty: {
                    message: ' '//Required and can\'t be empty
                },
                regexp: {
                    regexp: /^([0-9]+)$/,
                    message: ' ' //The value is not a valid number.
                },
                between: {
                    min: 1,
                    max: 10000000000000,
                    message: ' '
                }
            }
        };
        var validatorRequire = {
            validators: {
                notEmpty: {
                    message: ' '
                }
            }
        };

        $('#addIndent').formValidation({
            framework: 'bootstrap',
            excluded: [':disabled'],
            fields: {
                project_id: validatorRequire,
                'request[0][item_description_id]': validatorRequire,
                'request[0][quantity]': validatorNumric
            }
        });

        function resetBtn()
            {
                var i=0;
                var totalEle = ($('#elementData tbody').find('tr').length-1);
                $('#elementData tbody').find('tr').each(function(){
                    if(i==totalEle)
                    {
                        $(this).find('.input-group-btn').html('<button class="btn btn-success btn-add" type="button"><i class="fa fa-plus"></i></button>');
                    }
                    else
                    {
                        $(this).find('.input-group-btn').html('<button class="btn btn-warning btn-remove" type="button"><i class="fa fa-minus"></i></button>');
                    }
                    i++;
                });
            }

        $(document).on('click', '.btn-add', function(e){
            e.preventDefault();
            var controlForm = $('#elementData tbody'),
                currentEntry = $(this).parents('tr:first'),
                newCount = (parseInt(currentEntry.data('id'))+1),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);
            newEntry.find('.has-error').removeClass('has-error');
            newEntry.find('.has-success').removeClass('has-success');
            newEntry.find('.help-block').remove();

            newEntry.find('.select2.select2-container').remove();
            newEntry.find('select.item_description_ele').attr('name','request['+newCount+'][item_description_ele]').val('');
            newEntry.find('input.item_description_id').attr('name','request['+newCount+'][item_description_id]').val('');
            newEntry.find('select.item_description_ele').html(mr_html);
            newEntry.find('select.item_description_ele').removeClass('select2-hidden-accessible');
            newEntry.find('select.item_description_ele').select2();

            $('.item_description_ele').on('select2:select', function (e) {
                var data = e.params.data;
                if(data.id>0)
                {
                    $(this).parents('td').find('.item_description_id').val(data.id);
                    $(this).parents('tr').find('.unit_type').html(unit_types[data.id]);
                }
                else
                {
                    $(this).parents('td').find('.item_description_id').val('');
                    $(this).parents('tr').find('.unit_type').html('N/A');
                }
                $('#addIndent').bootstrapValidator('revalidateField',$(this).parents('td').find('.item_description_id').attr('name'));
            });

            newEntry.find('input.quantity').attr('name','request['+newCount+'][quantity]').val('');
            newEntry.find('textarea.remarks').attr('name','request['+newCount+'][remarks]').val('');
            newEntry.attr('data-id',newCount);

            $('#addIndent')
                .formValidation('addField', 'request[' + newCount + '][quantity]', validatorNumric)
                .formValidation('addField', 'request[' + newCount + '][item_description_id]', validatorRequire);

            controlForm.find('.element:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
            resetBtn();
        }).on('click', '.btn-remove', function(e){
            e.preventDefault();
            var loopCount = $(this).parents('tr').data('id');
            $(this).parents('tr').remove();
            $('#addIndent')
                .formValidation('removeField', 'request[' + loopCount + '][quantity]')
                .formValidation('removeField', 'request[' + loopCount + '][item_description_id]');
            resetBtn();
            //checkMile();
            return false;
        });

        $('.item_description_ele').on('select2:select', function (e) {
            var data = e.params.data;
            if(data.id>0)
                {
                    $(this).parents('td').find('.item_description_id').val(data.id);
                    $(this).parents('tr').find('.unit_type').html(unit_types[data.id]);
                }
            else
                {
                    $(this).parents('td').find('.item_description_id').val('');
                    $(this).parents('tr').find('.unit_type').html('N/A');
                }
            $('#addIndent').bootstrapValidator('revalidateField',$(this).parents('td').find('.item_description_id').attr('name'));
        });

    });
</script>
</body>
</html>