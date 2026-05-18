<div class="kt-portlet">
    <?php Component('FormHeader'); ?>

    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" action="<?= $loader['path'] ?>update" method="POST">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">name: <label class="kt-font-danger">*</label></label>
                <div class="col-10">
                    <input class="form-control" type="text" name="name" value="{name}">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Username: <label class="kt-font-danger">*</label></label>
                <div class="col-10">
                    <input class="form-control" type="text" name="username" value="{username}">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Kata Sandi: <label class="kt-font-danger">*</label></label>
                <div class="col-10">
                    <input class="form-control" type="password" name="password" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Konfirmasi Kata Sandi: <label class="kt-font-danger">*</label></label>
                <div class="col-10">
                    <input class="form-control" type="password" name="confirm_password" value="">
                </div>
            </div>
        </div>

        <input type="hidden" name="id" value="{id}">

        <?php Component('FormFooter'); ?>
    </form>
</div>
