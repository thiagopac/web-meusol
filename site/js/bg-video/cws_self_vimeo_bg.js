jQuery(document).ready(function (){
	vimeo_init();
	cws_self_hosted_video ();
});
jQuery(window).resize( function (){
	vimeo_init();
	cws_self_hosted_video ();
} );
function vimeo_init() {
	var element;
	var vimeoId;
	var chek;
	jQuery(".cws_Vimeo_video_bg").each(function(){
		element = jQuery(this);
		var el_width;
		var el_height;
		vimeoId = jQuery(".cws_Vimeo_video_bg").attr('data-video-id');

		jQuery("#"+vimeoId).vimeo("play");
			jQuery("#"+vimeoId).vimeo("setVolume", 0);
			jQuery("#"+vimeoId).vimeo("setLoop", true);
			el_width = element[0].offsetWidth;

		if (element[0].offsetHeight<((el_width/16)*9)) {
			el_height = (element[0].offsetWidth/16)*9;
		}else{
			el_height = element[0].offsetHeight;
			el_width = (el_height/9)*16;
		}
		jQuery("#"+vimeoId)[0].style.width = el_width+'px';
		jQuery("#"+vimeoId)[0].style.height = el_height+'px';
		setInterval(check_on_page, 1000);
	})

	function check_on_page (){
		if (document.getElementsByTagName('html')[0].hasAttribute('data-focus-chek')) {		
			if (chek < 1) {
				chek++
				jQuery("#"+vimeoId).vimeo("play");
			}else{
				chek = 1
			}									
		}else{
			jQuery("#"+vimeoId).vimeo("pause");
			chek = 0;
		}
	}	
}

function cws_self_hosted_video (){
	var element,el_width,video
	jQuery('.cws_self_hosted_video').each(function(){
		element = jQuery(this)
		video = element.find('video')
		el_width = element[0].offsetWidth;

		if (element[0].offsetHeight<((el_width/16)*9)) {
			el_height = (element[0].offsetWidth/16)*9;
		}else{
			el_height = element[0].offsetHeight;
			el_width = (el_height/9)*16;
		}
		video[0].style.width = el_width+'px';
		video[0].style.height = el_height+'px';
	})	
}