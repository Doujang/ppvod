$(document).ready(function(){
	$('.carousel-indicators').on('click','li',function(){
		$("img").lazyload({ threshold : 200 });
	});	
	//
	if($(".nav-sub ul.text-right").length > 0){
		$id = $(".nav-sub ul.text-right").attr('data-id');
		$('#'+$id).addClass('active');
		$('#'+$id+' a').append('<span class="ico-arr"></span>');
	}
	//
	$(".vod-type dl dt").each(function(i){
		$id = $(".vod-type dl dt").eq(i).attr('data-id');
		$('#'+$id).addClass('active');
	});
});