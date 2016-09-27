<?foreach($data['goods'] as $key):?>
			<div class="prod-item" data-id='<?=$key["id"];?>'>
				<div class="good-wrap">
					<div class='prod-title'>
						<a href="/index/prod/id/<?=$key["id"]?>">
							<h2><?=$key['title'];?></h2>
						</a>
					</div>
					<div class="main-img-prod">
						<div class="good-morelink"><a href="/shop/prod/id/<?=$key["id"]?>">Посмотреть</a></div>
						<img src="<?=$key['path_to_img'];?>" alt="">
					</div>
					<div class="m-desc">
						<p><?=$key['m_desc'];?></p>
					</div>
					<div class="good-bottom clear">					
						<div class='prod-price'>
							<p><?=$key['price'];?><span> .руб</span></p>
						</div>
						<!-- <a class="good-backet-link">В корзину</a> -->
						<div class="good-backet-link">
							<div class="add-prod <?echo Bucket::is_prod($key['id']);?>">
								<p>Добавлено</p>
							</div>
							<p>В корзину</p>
						</div>
					</div>
				</div>
			</div>
		<?endforeach;?>