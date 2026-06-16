<div class="kt-portlet">
    <?php Component('FormHeader'); ?>

    <!--begin::Form-->
    <form id="form" class="kt-form" autocomplete="off" action="<?= $loader['path'] ?>save" enctype="multipart/form-data" method="POST">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Image:</label>
                <div class="col-10">
                    <div class="kt-avatar kt-avatar--outline" id="kt_apps_user_add_avatar">
                        <div class="kt-avatar__holder" style="background-image: url(&quot;{uploadsPath}work/{image}&quot;); background-position: center; background-size: contain; width: 240px; height: 180px;"></div>
                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change image">
                            <i class="fa fa-pen"></i>
                            <input type="file" name="image" accept=".png, .jpg, .jpeg, .webp">
                        </label>
                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel image">
							<i class="fa fa-times"></i>
						</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Name: <label class="kt-font-danger">*</label></label>
                <div class="col-10">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="{name}">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Description:</label>
                <div class="col-10">
                    <textarea class="form-control" name="description" placeholder="Description" rows="10">{description}</textarea>
                </div>
            </div>
        </div>

        <input type="hidden" name="id" value="{id}">

        <?php Component('FormFooter'); ?>
    </form>
</div>
