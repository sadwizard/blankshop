<?include 'admin-header.php';?>
<div class="container main-info">
	<h1>Основная информация</h1>
</div>
<div class="container">
	<?include 'main-menu.php';?>
	<div class="content">
		<h2>Добавление нового товара.</h2>
		<hr>
		<form action="" id='new-product-form' enctype="multipart/form-data" method="POST" >
				<div class="row" id='name-prod'>
					<p>Название товара</p>
					<input type="text" name='title' id='title-prod'>
				</div>
				<div class="row" id='m-desc'>
					<p>Короткое описание</p>
					<input type="text"  name='mdesc' id='mini-desc-prod'>
				</div>
				<div class="row desc" >
					<p>Описание</p>
					<textarea name="desc"  cols="30" rows="10" id='desc-prod'></textarea>		
				</div>
				<div class="row desc">
					<p>Характеристики</p>
					<textarea name="chracter"  cols="30" rows="10" id='character'></textarea>
				</div>
				<div class="row" id='brand'>
					<p>Производитель</p>
					<input type="text" name='brand' id='brand-prod'>
				</div>
				<div class="row" id='cost'>
					<p>Стоимость</p>
					<input type="text" name='price' id='price-prod'>
					<small>Указывать без наименования валюты.</small>
				</div>
			<div class="row" id='cat'>
				<div class="row" id='cat-prod'>
					<p>Категория</p>
					<select name="cat" id="">
						<?foreach($data['cat_list'] as $item):?>
							<option value="<?=$item['cat_id'];?>"><?=$item['cat_name'];?></option>
						<?endforeach;?>
					</select>
				</div>
				<div class="row" id='add-cat'>
					<p>Добавить категорию</p>
				</div>
			</div>
			<div class="row">
				<p>Загрузить изображения</p>
					Отправить этот файл: <input name="userfile" type="file" >
			</div>
			<hr>
			<button class='save-btn' id='saveall-btn'>Сохранить</button>
		</form>
	</div>
</div>
<?include 'admin-footer.php';?>