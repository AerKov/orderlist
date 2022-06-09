<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/datatables/css/datatables.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/main/style.css">
</head>
<body>
<div class="container main">
	<div class="row">
		<div class="form-group">
			<button type="button" id="add_order" class="btn btn-success" name="button">
				Добавить
			</button>
			<button type="button" class="btn btn-default clear_fillter_bought" name="button">
				Все записи
			</button>
			<button type="button" id="bought" class="btn btn-info" name="button">
				Куплено
			</button>
			<button type="button" id="no_bought" class="btn btn-warning" name="button">
				Не куплено
			</button>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<table id="orders_table" class="table table-bordered"></table>
		</div>
		<div class="col-md-3">
			<div class="panel panel-success">
				<div class="panel-heading">
					Категории
				</div>
				<div class="panel-body">

					<div class="btn-group-vertical" id="categories">

					</div>
					<button type="button" id="add_category" class="btn btn-sm btn-success" name="button">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Добавить
					</button>
			</div>
		</div>
	</div>
</div>
	<div id="order_modal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Добавить</h4>
				</div>
				<div class="modal-body">
					<form id="order_form" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="row">
							<input type="hidden" name="id" value="0">
							<div class="form-group form-group">
								<label for="name" class="control-label col-md-2">Название</label>
								<div class="col-md-9">
									<input type="text" name="name" placeholder="Введите название товара" class="form-control">
								</div>
							</div>
							<div class="form-group form-group">
								<label for="categories" class="control-label col-md-2">Категория</label>
								<div class="col-md-9">
									<select name="category_id" id="order_categories" class="form-control">
									</select>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
					<button type="button" id="save_order" class="btn btn-primary">Сохранить</button>
				</div>
			</div>
		</div>
	</div>
	<div id="category_modal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Добавить</h4>
				</div>
				<div class="modal-body">
					<form id="category_form" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="row">
							<input type="hidden" name="id_category" value="0">
							<div class="form-group form-group">
								<label for="category_name" class="control-label col-md-2">Название</label>
								<div class="col-md-9">
									<input type="text" name="category_name" placeholder="Введите название категории" class="form-control">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
					<button type="button" id="save_category" class="btn btn-primary">Сохранить</button>
				</div>
			</div>
		</div>
	</div>
<script src="<?php echo base_url(); ?>asset/jquery.js"></script>
<script src="<?php echo base_url(); ?>asset/datatables/js/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>asset/main/orders.js"></script>
</body>
</html>
