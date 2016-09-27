<?include 'admin-header.php';?>
<div class="container main-info">
	<h1>Основная информация</h1>
</div>
<div class="container">
	<?include 'main-menu.php';?>
	<div class="content">
		<div class="main-content-menu">
			<a href="/admin/addproduct/" id='addprod-btn'>Добавить товар</a>
		</div>
		<table class='prod-table'>
			<tr class='title-table'>
				<td>id</td>
				<td>Заголовок</td>
				<td>Краткое описание</td>
				<td>Статус</td>
				<td>Категория</td>
				<td>Цена</td>
				<td>sefs</td>
			</tr>
			<?foreach($data['goods'] as $key):?>
				<tr class='t-body'>
					<td><?=$key['id'];?></td>	
					<td class='t-left'><?=$key['title'];?></td>
					<td class='table-m-desc t-left'><?=$key['m_desc'];?></td>
					<td></td>
					<td><?=$key['category_name'];?></td>
					<td><?=$key['price'];?>.руб</td>
					<td><a class='table-btn-r' href='/admin/edit/id/<?=$key["id"]?>'>Edit</a><a class='table-btn-r' href='/admin/delprod/id/<?=$key["id"]?>'><i class="fa fa-trash-o"></i></a></td>
				</tr>
			<?endforeach;?>
		</table>
		<div class="good-items">
		</div>
	</div>
</div>
<?include 'admin-footer.php';?>