<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-success fade show" role="alert">
			<div class="alert-icon"><i class="flaticon-warning"></i></div>
			<div class="alert-text">
				<strong>Hi {userName}</strong>, Welcome Back . You Last Login :
				<strong><?= lastLoginDate(date('Y-m-d H:i:s')); ?></strong>
			</div>
			<div class="alert-close">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="la la-close"></i></span>
				</button>
			</div>
		</div>
	</div>
</div>