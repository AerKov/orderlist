let table;
$(document).ready(function () {
	show_orders();
	show_categories();
	$('#orders_btn').appendTo('.table_btn');
});
/*ORDERS*/
function show_orders(){
	table = $('#orders_table').DataTable({
		ajax: {
			url: 'orders/get_orders',
			dataSrc: '',
		},
		language: {
			url:'//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json'
		},
		processing: true,
		dom: "<'row'<'col-sm-6' l><'col-sm-6'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
		buttons: [
			{
				text: '<i class="fa fa-plus"></i>',
				className: 'button is-primary add modal-button',
				action: function () {

				}
			},
		],
		columns: [
			{ 'title':'ID','data': 'id'},
			{ 'title':'Название','data': 'name'},
			{ 'title':'Категория','data': 'category_name' },
			{ 'title':'Статус','data': 'execution' },
			{ 'title':'Дата','data': 'date' },
			{
				'title':'Настройка',
				'data': null,
				'defaultContent':'<button type="button" class="delete btn btn-sm btn-danger">' +
					'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>' +
					'</button>'
			}
		],
		"columnDefs": [ {
			"targets": 3,
			"createdCell": function (td, cellData, rowData, row, col) {
				if ( cellData == 0 ) {
					$(td).html('<input class="form-check-input executionCheckbox" type="checkbox" value="'+cellData+'">');
				}
				else {
					$(td).html('<input class="form-check-input executionCheckbox" checked type="checkbox" value="'+cellData+'">');
				}
			}
		} ],
	})
}

$('#add_order').on('click',function() {
	$('#order_modal').modal('show');
	$("#order_form")[0].reset();
	$('#order_categories').html('');
	for (let i = 0; i < get_categories().length; i++) {
		let option = '<option value='+get_categories()[i].id_category+' className="danger">'+get_categories()[i].category_name+'</option>';
		$('#order_categories').append(option);
	}
});

$('#save_order').on('click',function() {
	$.ajax({
		url : 'orders/create_order',
		type: 'POST',
		data: $('#order_form').serialize(),
		dataType: 'JSON',
		success: function(data){
			$('#order_modal').modal('hide');
			table.ajax.reload();
		}
	});
});

$('#orders_table').on('click','tbody .delete', function() {
	let data = table.row($(this).closest('tr')).data();
	$.ajax({
		url : 'orders/delete_order/'+data.id,
		type: 'GET',
		success: function(data){
			table.ajax.reload();
		}
	});
});

$('#orders_table').on('click','tbody .executionCheckbox', function() {
	let data = table.row($(this).closest('tr')).data();
	console.log(data.execution);
	let execution;
	if (data.execution == 0) {
		execution = 1;
	}else {
		execution = 0;
	}
	$.ajax({
		url : 'orders/update_execution/'+data.id+'/'+execution,
		type: 'GET',
		success: function(data){
			table.ajax.reload();
		}
	});
});
/*END ORDERS*/

/*CATEGORIES*/
function show_categories() {
	$('#categories').html('<button type="button" class="btn clear_filter_category">Все категории</button>');
	for (let i = 0; i < get_categories().length; i++) {
		let option = ' <button type="button" class="btn filter_category">'+get_categories()[i].category_name+'</button>';
		$('#categories').append(option);
	}
}

$('#add_category').on('click',function() {
	$('#category_modal').modal('show');
	$("#category_form")[0].reset();
});

$('#save_category').on('click',function() {
	$.ajax({
		url : 'categories/create_category',
		type: 'POST',
		data: $('#category_form').serialize(),
		dataType: 'JSON',
		success: function(data){
			$('#category_modal').modal('hide');
			show_categories();
		}
	});
});

function get_categories() {
	let categories;
	$.ajax({
		url : 'categories/get_categories',
		type: 'GET',
		async: false,
		dataType: 'JSON',
		success: function(data){
			categories = data;
		}
	});
	return categories;
}
/*END CATEGORIES*/

/*FILTER*/
$('#bought').on('click', function () {
	table.columns(3).search(1).draw();
});
$('#no_bought').on('click', function () {
	table.columns(3).search(0).draw();
});
$('.clear_fillter_bought').on('click', function () {
	table.columns(3).search('').draw();
});

$('#categories').on('click','.filter_category', function () {
	table.columns(2).search($(this).text()).draw();
});
$('#categories').on('click','.clear_filter_category', function () {
	table.columns(2).search('').draw();
});
/*END FILTER*/
