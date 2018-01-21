$(function(){
  $(".list-more").click(function(){
    if($(this).siblings(".hidden_event").is(":visible"))
		{
			$(this).siblings(".hidden_event").hidden();  
		}
		else
		{
			$(this).siblings(".hidden_event").show();
			$(".list-more").css({display:'none'});
			 
		} 
	   
    }) 
  function tab(){
               $('.tabnav ul li').on('click',function(){
                   var index=$(this).index();
                   $(this).addClass('on').siblings().removeClass('on');
                   $(".tabcon ul li").eq(index).addClass('on').siblings().removeClass('on');
               }); 
           } 
        tab(); 
})