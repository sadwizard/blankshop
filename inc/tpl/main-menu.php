	<div class="container">
		<div class="menu-items">
			<a href="/index/" <?if($data['model_name'] == 'index')echo ' class="active"';?> >Главная</a>
			<a href="/shop/" <?if($data['model_name'] == 'shop')echo ' class="active"';?> >Магазин</a>
			<a href="/posts/index/" <?if($data['model_name'] == 'blog')echo ' class="active"';?> >Блог</a>
			<a href="" <?if($data['model_name'] == 'about')echo ' class="active"';?> >О нас</a>
			<a href="">Доставка</a>
		</div>
		<div class="basket">
			<div class="info-basket">
			<?$bucket_list =json_decode(Bucket::getCardList());?>
				<p>(<span id='count-bucket'><?=$bucket_list->count_prod;?></span>)  Корзина</p>
			</div>
			<div class="basket-prod-list">
				<div class="list-b">
					<?if(is_array($bucket_list->data)){?>
						<? foreach($bucket_list->data as $key):?>
							<div class='item-bucket clear' data-item-id='<?=$key->text->id?>' >
								<div class="del-item">x</div>
								<div class="i-img">
									<img src="<?=$key->text->path_to_img;?>" alt="">
								</div>
								<div class="i-info">
									<p class="title"><?=$key->text->title?></p>					
								</div>
								<div class="i-counter">
									<div class='c-minus'>-</div>
									<div class='c-count'><?=$key->count?></div>
									<div class='c-plus'>+</div>
								</div>
								<div class="i-price"><?=$key->text->price;?> руб.</div>
							</div>
						<?endforeach;?>
						<div class="b-main-info">
							<div class='main-fullcost'>
								<p><span id='main-count'><?=$bucket_list->count_prod?></span> товара на сумму: <span id='main-cost'><?=$bucket_list->full_cost;?> </span>руб.</p>
							</div>
							<button id="go-to-pay">Перейти к оплате</button>
						</div>
					<?}else{;?>
						<div class='item-bucket'  >
							<p class="title" style='text-align:center;' >В корзине пусто <i class="fa fa-shopping-cart"></i></p>
						</div>	
					<?};?>
				</div>
			</div>
		</div>
	</div>