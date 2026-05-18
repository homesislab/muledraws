<div class="kt-portlet">
    <?php Component('FormHeader'); ?>

    <!--begin::Form-->
    <form id="form" class="kt-form" autocomplete="off" action="<?= $loader['path'] ?>save" enctype="multipart/form-data" method="POST">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Name: <label class="kt-font-danger">*</label></label>
                <div class="col-10">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="{name}">
                </div>
            </div>
        </div>

        <input type="hidden" name="id" value="{id}">

        <?php Component('FormFooter'); ?>
    </form>
</div>
