<div class="kt-portlet">
    <?php Component('FormHeader'); ?>

    <!--begin::Form-->
    <form id="form" class="kt-form">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Image:</label>
                <div class="col-10">
                    <div class="kt-avatar kt-avatar--outline" id="kt_apps_user_add_avatar">
                        <div class="kt-avatar__holder" style="background-image: url(&quot;{uploadsPath}carousel/{image}&quot;); background-position: center; background-size: contain; width: 240px; height: 140px;"></div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Description:</label>
                <div class="col-10">
                    <textarea class="form-control" rows="10" disabled>{description}</textarea>
                </div>
            </div>
        </div>
    </form>
</div>
