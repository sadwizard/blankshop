var urls = {
	addToCard: '/bucket/addBucketList/',
	getCardList:'/bucket/getBucketList/',
	delToCardList:'/bucket/delBucketList/',
};

(function(){
	scrollMenu();
	backetInit();
}())

function scrollMenu(){
	var menuOffsetTop = $('#menu-main').offset().top;

	$(document).scroll(function(){
		var scroll = $(document).scrollTop();
		
		if(scroll <= menuOffsetTop){
			$('#menu-main').removeClass('fixed');
			//$('.sidebar').removeClass('fixed');
		}else{
			$('#menu-main').addClass('fixed');
			//$('.sidebar').addClass('fixed');
		}
	})
}

function backetInit(){
	//if(!$('.good-backet-link').length){return false;}
	if(!$('.basket').length){return false;}

	var bucketProdList = $('.list-b');
	var countBucket = $('#count-bucket');

	$('.good-backet-link').on('click' , function(){
		var layeradd = $(this).find('.add-prod');
		
		if(!layeradd.hasClass('active')){
			layeradd.addClass('active')
		}
	})

	$('.info-basket').on('click' , function(){
		if($('.basket-prod-list').hasClass('active')){
			$('.basket-prod-list').removeClass('active');
		}else{
			$('.basket-prod-list').addClass('active');
		}
	})
	//=================
	// product item query
	//=================
	$('.good-backet-link').on('click' , function(e){

		var target = e.target;
		var id = getProductId(target , ".prod-item" , 'data-id');

		query({url:urls.addToCard , data:'addtocard='+id} , true ,function(result){
			console.log(typeof result.data)
			if(typeof result.data == 'object'){
				console.log(result)// добавляем товар в карзину
			}else if(typeof result.data == 'boolean'){
				console.log(result + ' number')
				// увеличиваем счетчик товара в карзине
			}
		})
	})

	//=================
	// bucket query
	//=================
	$('.del-item').on('click' , function(e){
		var target = e.target;
		var id = getProductId(target , '.item-bucket' , 'data-item-id');
		query({url:urls.delToCardList , data:'deltocard='+id} , false ,function(data){
			if(data){
					delItemToCard(id);					
			}else{
				console.error('Что-то пошло не так!')
			}
		})
	})




	//=================
	// bucket action
	//=================
	function delItemToCard(id){
 		var el = getItemCardEl(id);
		el[0].animate({height:'0px'} , 500, function(){
			el[0].remove();
			var count = parseInt(countBucket.html()) -1;
			countBucket.html(count);
			$('#main-count').html(count);
		});
	}

	function addItemToCard(){

	}




	function countItemCard(){
		return bucketProdList.children().length -1;
	}
	function getItemCardEl(id){
			var res = [];
			bucketProdList.children().each(function(i , el){
				var dataId = $(el).attr('data-item-id');
				if(dataId){
					if(parseInt(id) == parseInt(dataId)){
						res.push($(el));	
					} 
				}
			})
			return res;
	}

	function getProductId(el , parent , attr){
		 var id = $(el).closest(parent ).attr(attr);
		 return id;
	}
}