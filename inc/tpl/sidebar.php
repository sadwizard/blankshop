<div class="sidebar-wrap">
	<div class="sidebar clear">
		<div class="filter-item">
			<p>Категории</p>
			<div class="category-list">
				<?foreach($data['cat'] as $key):?>
					<a href="/shop/cat/id/<?=$key['cat_id'];?>" class='<?if($key["cat_id"] == $data['cat_id']){echo "active";}?>'><?=$key['cat_name'];?></a>
				<?endforeach;?>
			</div>
		</div>
		<div class="sidebarblock">
			<p class='title'>Фильтр</p>
		</div>	
	</div>
</div>