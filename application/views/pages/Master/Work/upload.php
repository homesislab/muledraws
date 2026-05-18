<div class="kt-portlet">
    <?php Component('FormHeader'); ?>

    <!--begin::Form-->
    <form id="form" class="kt-form" autocomplete="off" action="<?= $loader['path'] ?>uploadArtwork" enctype="multipart/form-data" method="POST">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Image:</label>
                <div class="col-10">
                    <div class="kt-avatar kt-avatar--outline" id="kt_apps_user_add_avatar">
                        <div class="kt-avatar__holder" style="background-image: url(&quot;{uploadsPath}work/{image}&quot;); background-position: center; background-size: contain; width: 240px; height: 180px;"></div>
                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change image">
                            <i class="fa fa-pen"></i>
                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
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
        </div>

        <input type="hidden" name="id" value="{id}">
        <input type="hidden" name="artwork_id" value="{artwork_id}">

        <?php Component('FormFooter'); ?>
    </form>
</div>

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-cube"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                List Artwork
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th class="text-center" width="10%">No.</th>
                    <th class="text-center" width="20%">Image</th>
                    <th class="text-center" width="60%">Name</th>
                    <th class="text-center" width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($work_detail as $index => $row) { ?>
                <tr>
                    <td class="text-center"><?= $index + 1; ?></td>
                    <td class="text-center"><img width="100px" style="border: solid 1px #eee; border-radius: 10px;" alt="<?= $row->name; ?>" src="{uploadsPath}work/<?= $row->image; ?>"></td>
                    <td class="text-center"><?= $row->name; ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('master/works/deleteArtwork/' . $row->id); ?>" class="btn btn-sm btn-clean btn-icon btn-icon-md action-delete" title="Delete"><i class="la la-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

