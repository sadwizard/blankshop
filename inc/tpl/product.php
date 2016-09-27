<? include 'header-not-info.php';?>

<div class="full-desc-prod clear">
	<div class="f-titleinfo">
		<h2><?=$data['prod']['title'];?></h2>
	</div>	
	<div class="gallery-prod">
		<div class="g-viewport">
			<img src="<?=$data['prod']['path_to_img'];?>" alt="">
		</div>
		<div class="g-thumbs"></div>
	</div>
	<div class="f-maininfo clear">
		<div class="full-desc">
			<p><?=$data['prod']['full_desc'];?></p>
		</div>
		<div class="f-pricedesc">
			<h1>Цена <span><?=$data['prod']['price'];?></span>руб</h1>
			
		</div>
	</div>
</div>
<div class="f-tabsblock clear">
	<div class="f-tabs clear">
		<button class='active'>Характеристики</button>
		<button>Отзывы</button>
		<button>Обзоры</button>
	</div>
	<div class="f-tabs-area"></div>
</div>
<? include 'footer.php';?>