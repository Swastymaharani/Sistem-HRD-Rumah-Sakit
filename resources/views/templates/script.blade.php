<script>
const CustomSwal = Swal.mixin({
		width:'20em',
		customClass: {
			confirmButton: 'btn btn-primary',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	});

$(document).ready(function(){
	jQuery.fn.dataTable.Api.register('processing()', function ( show ) {
		return this.iterator('table', function ( ctx ) {
			ctx.oApi._fnProcessingDisplay( ctx, show );
		});
	});

    $('.select2').select2({
        dropdownParent: $('.modal-content')
    });

    $('.select2').select2({
		selectOnClose: true,
		closeOnSelect: true,
		placeholder:"-",
	});

	$('.datepicker').datepicker({
		format: "dd-mm-yyyy",
		todayBtn: "linked",
		clearBtn: false,
		language: "id",
		autoclose: true,
		todayHighlight: true,
		toggleActive: true,
	});

	$('#user_role').change(function(){
		window.location = "{{url('rbac/rbac/changeRoleActive')}}/"+$(this).val();
	});
});

$(function(){
    $("[data-hide]").on("click", function(){
        $(this).closest("." + $(this).attr("data-hide")).hide();
    });
});
function RefreshTable(tableId, tolast){
	if(tolast){
		$('#'+tableId).DataTable().page('last').draw('page');
	}else{
		$('#'+tableId).DataTable().ajax.reload(null,false);
	}
}

function block(content_id) {
    $.blockUI.defaults.css.border = '0px solid red'; 
	$.blockUI.defaults.css.backgroundColor = 'none'; 
	$.blockUI.defaults.overlayCSS.backgroundColor = '#ffff'; 
	$(content_id).block({ 
		message: '<p><img src="{{asset('assets/images/loader-sm.gif')}}"/></p>'
	});
}
function unblock(content_id) {
    $(content_id).unblock();
}
</script>