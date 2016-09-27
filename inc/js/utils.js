//  params
// {url , data}
//  parseToJson
//  callback
var query = function(param , toJson , cb ){
	$.ajax({
		url:param.url,
		type:'POST',
		data:param.data,
		success:function(data){
			if(toJson){
				cb($.parseJSON(data));
			}else{
				cb(data);
			}
		}
	});
};