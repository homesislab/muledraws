function coalesceField(field) {
	return (field ? field : "-");
}

function statusRow(id) {
	const status = {
		0: {
			'title': 'Non-Active',
			'class': ' kt-badge--danger'
		},
		1: {
			'title': 'Active',
			'class': ' kt-badge--success'
		},
	};
	return `<span class="kt-badge ${status[id].class} kt-badge--inline kt-badge--pill">${status[id].title}</span>`;
}

function transactionType(id) {
	const status = {
		1: {
			'title': 'Online',
			'class': ' kt-badge--primary'
		},
		2: {
			'title': 'Offline',
			'class': ' kt-badge--warning'
		},
	};
	return `<span class="kt-badge ${status[id].class} kt-badge--inline kt-badge--pill">${status[id].title}</span>`;
}

function actionRow(id, status, permission = 'view,edit,delete') {
	const listAction = {
		'view': `<a href="${path}view/${id}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View"><i class="la la-eye"></i></a>`,
		'edit': `<a href="${path}edit/${id}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit"><i class="la la-edit"></i></a>`,
		'delete': `<a href="${path}delete/${id}" class="btn btn-sm btn-clean btn-icon btn-icon-md action-delete" title="Delete"><i class="la la-trash"></i></a>`,
		'print': `<a href="${path}printInvoice/${id}" class="btn btn-sm btn-label-primary btn-icon btn-icon-md btn-print" title="Print Invoice"><i class="la la-print"></i></a>`,
	};

	var action = "";
	const listPermission = permission.split(',');
	listPermission.forEach(function (value) {
		action += `<span class="m-1">${listAction[value]}</span>`;
	});

	if (status == 1) {
		return action;
	} else {
		return '<a href="javascript:void(0)" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-ban"></i></a>';
	}
}

function actionDelete(url) {
	swal.fire({
		title: 'Are you sure?',
		text: "You will not be able to restore this data!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, delete!',
		confirmButtonColor: "#fd397a",
		cancelButtonText: 'No, cancel!'
	}).then(function (result) {
		if (result.value) {
			location.replace(url);
		}
	});
}
