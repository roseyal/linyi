function device(){var sUserAgent=navigator.userAgent.toLowerCase();var device={};device.Ipad=sUserAgent.match(/ipad/i)=="ipad";device.Iphone=sUserAgent.match(/iphone os/i)=="iphone os";device.Midp=sUserAgent.match(/midp/i)=="midp";device.Uc7=sUserAgent.match(/rv:1.2.3.4/i)=="rv:1.2.3.4";device.Uc=sUserAgent.match(/ucweb/i)=="ucweb";device.Android=sUserAgent.match(/android/i)=="android";device.CE=sUserAgent.match(/windows ce/i)=="windows ce";device.WM=sUserAgent.match(/windows mobile/i)=="windows mobile";device.phone=device.Iphone||device.Uc7||device.Uc||device.Android||device.CE||device.WM?true:false;device.pad=device.Ipad?true:false;device.mobile=device.pad||device.phone?true:false;return device}
function devRedirect(){
	wl=['/divine'],mhost = 'm.jushuo.com',host = window.location.host;
	var url='',ckn='go_ms',dev = device();
	if(!dev.phone) return;
		url=location.href;
		url=url.toLowerCase();
		for(i=0;i<wl.length;i++){
			if(location.href.indexOf(wl[i])>-1) return
		};
		surl=url;
		surl=surl.replace(host,mhost);
		console.log(surl+'d')
	if(surl) location=surl;
}
devRedirect();
$(function(){
var ah =100;
$(window).scroll(function() {	
	//椤甸潰婊氬姩鏄剧ず闅愯棌锛屽洖鍒伴《閮ㄦ寜閽�
	var fh = window.screen.height;
    var dh =document.documentElement.clientHeight;  
    var ch = $(".bottom").offset().top;
    var botheight=ch-dh;
	if ($(window).scrollTop() > 145 && $(window).scrollTop() < botheight ) {
		$(".piao").fadeIn(500);
        $(".piao").css("bottom","50px")
	}
	else {
		if($(window).scrollTop() > botheight){
			var height = $(window).scrollTop()-botheight ;
			$(".piao").css('bottom',50+height+'px');	
		}else{
			$(".piao").fadeOut(500);
			$(".piao").css("bottom","50px");
		}
	}
	
	//椤甸潰婊氬姩鍥哄畾瀵艰埅
	if ($(window).scrollTop() > 200) {
		$(".nav").css({"position":"fixed","top":"0"})
		$(".nav .nav1 a.icon_logo").css("display","block")
		$(".nav .nav2_list").slideUp();
	} else {
		$(".nav").css("position","static")
		$(".nav .nav1 a.icon_logo").css("display","none")
	}
		
});

/*鍥為《閮�*/
$(".piao ul li.icon_returntop").click(function() {
	$('body,html').animate({
		scrollTop: 0
     }, 500);
});	



//绐楀彛姘村钩灞呬腑
$(window).resize(function(){
	login_center();
});	

function login_center(){
	var bodyheight=$(window).height()
	var loginheight = $("#layer .login").height()
	var mianbgMt=(bodyheight-loginheight)/2
	$("#layer .login").css("top",mianbgMt);
}



$(".imgtxt_list li a").hover(function(){
	$("p",this).stop().animate({bottom:'0'},300);	
},function(){
	$("p",this).stop().animate({bottom:'-60px'},300);	
})


})

	