(function(){
	if($('#saveall-btn').length){
		saveNewProduct($('#saveall-btn')); 
	}
}())

var notify = function(message , time ,cbstart , cb ){
	if(cbstart) cbstart();
	var contain = $('.notify-block');
	var containM = $('.message-notify');
	contain.addClass('show');
	containM.html(message);
	setTimeout(function(){
		contain.removeClass('show');
		if(cb) cb();
	}, time * 1000);
}

function saveNewProduct(el){
	el.on('click' , function(e){
		e.preventDefault();
		var title = $('#title-prod') ,
			mDesc = $('#mini-desc-prod') ,
			desc = $('#desc-prod') ,
			character = $('#character') ,
			cost =  $('#price-prod') ,
			cat = $('#cat-prod select');

		var inputs = [title ,mDesc ,desc , character ,cost ,cat];

		if(checkInputs(inputs)){
			var data = getDataForList(inputs);

			ajaxSave(data , '/admin/ajaxSaveProd/');
		}
	})
}
function valClear(){
	var title = $('#title-prod') ,
			mDesc = $('#mini-desc-prod') ,
			desc = $('#desc-prod') ,
			character = $('#character') ,
			cost =  $('#price-prod') ,
			cat = $('#cat-prod select');

		var inputs = [title ,mDesc ,desc , character ,cost ,cat];	
		for(var i in inputs){
			inputs[i].val('');
		}
}

function checkInputs(list){
	var err = [];
	for(var i in list){
		if(list[i].val() == undefined || list[i].val() == ''){
			list[i].addClass('err');
			err.push(list[i]);
		}else{
			list[i].removeClass('err');
		}
	}

	if(err.length == 0){
		return true;
	}else{
		return false;
	}
}
// return serialize array
function getDataForList(list){
	var data = [];
	var serializeData = '';
	for(var i in list){
		data.push([list[i].attr('name') , list[i].val()])
	}
	for(var u in data){
		serializeData += '&'+ data[u][0] +'='+ data[u][1] ;
	}
	return serializeData;
}
function ajaxSave(data2 , url){

		//$('#saveall-btn').css({opacity:0 , visibility:'hidden'})
		var formData = new FormData($('#new-product-form').get(0));
		 $.ajax({
		      url: url,
		      type: 'POST',
		      contentType: false, // важно - убираем форматирование данных по умолчанию
		      processData: false, // важно - убираем преобразование строк по умолчанию
		      data: formData,
		      success: function(data){
		      		if(data){
						notify('Товар сохранен в базу данных' , 3 , function(){
							$('#saveall-btn').css({opacity:0 , visibility:'hidden'})
						} ,function(){
							$('#saveall-btn').css({opacity:1 , visibility:'visible'})
							valClear();
						})
		      		}else{
		      			notify('Ошибка! Чтото пошло не так' ,3 );
		      		}
		      }
	    });

		
}

