<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
				{title}
			</h3>
        </div>
    </div>

    <!--begin::Form-->
    <form id="form" class="kt-form" autocomplete="off" action="<?= $loader['path'] ?>save" enctype="multipart/form-data" method="POST">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Business Name: <label class="kt-font-danger">*</label></label>
                <div class="col-10">
                    <input class="form-control" type="text" name="name" placeholder="Business Name" value="{name}">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">E-mail:</label>
                <div class="col-10">
                    <input class="form-control mask-email" type="text" name="email" placeholder="E-mail" value="{email}">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Phone Number: <label class="kt-font-danger">*</label></label>
                <div class="col-10">
                    <input class="form-control mask-phone" type="text" name="phone" placeholder="Phone Number" value="{phone}">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Address:</label>
                <div class="col-10">
                    <textarea class="form-control" rows="3" name="address" placeholder="Address">{address}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Logo:</label>
                <div class="col-10">
                    <div class="kt-avatar kt-avatar--outline" id="kt_apps_user_add_avatar">
                        <div class="kt-avatar__holder" style="background-image: url(&quot;{uploadsPath}logos/{logo}&quot;); background-position: center; background-size: contain; width: 220px; height: 120px;"></div>
                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change logo">
                            <i class="fa fa-pen"></i>
                            <input type="file" name="logo" accept=".png, .jpg, .jpeg">
                        </label>
                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel logo">
							<i class="fa fa-times"></i>
						</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Bio:</label>
                <div class="col-10">
                    <textarea class="form-control" name="bio" placeholder="Bio" rows="10">{bio}</textarea>
                </div>
            </div>

            <div class="kt-separator kt-separator--border-dashed kt-mt-5"></div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Social Media</label>
                <div class="col-10">
                    <table class="table table-striped table-hover table-bordered" id="tableSocialMedia">
                        <thead>
                            <tr>
                                <td class="text-center" width="10%">Name</td>
                                <td class="text-center" width="10%">URL</td>
                                <td class="text-center" width="5%">
                                    <button type="button" class="btn btn-primary btn-icon actionAddSocialMedia"><i class="la la-plus"></i></button>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($listSocmed) && is_array($listSocmed)) { ?>
                                <?php foreach ($listSocmed as $socmed) { ?>
                                    <tr>
                                        <td>
                                            <input class="form-control socialMediaName" type="text" placeholder="Name" value="<?= $socmed->name; ?>">
                                        </td>
                                        <td>
                                            <input class="form-control socialMediaURL" type="text" placeholder="URL" value="<?= $socmed->url; ?>">
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger btn-icon actionRemoveSocialMedia"><i class="la la-trash"></i></button>
                                        </td>
                                    </tr>
                                <? } ?>
                            <? } else { ?>
                                <tr>
                                    <td>
                                        <input class="form-control socialMediaName" type="text" placeholder="Name" value="">
                                    </td>
                                    <td>
                                        <input class="form-control socialMediaURL" type="text" placeholder="URL" value="">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-icon actionRemoveSocialMedia"><i class="la la-trash"></i></button>
                                    </td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <input type="hidden" name="id" value="{id}">
        <input type="hidden" name="social_media" id="socialMedia" value="">

        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="<?= $loader['path'] ?>" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>