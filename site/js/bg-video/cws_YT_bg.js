/* YouTube video Background */

var i,
	currTime,
	duration,
	video_source,
	video_id,
	el_height,
	element,
	el_width,
	el_quality;

	element = document.getElementsByClassName("cws_Yt_video_bg"); 
	
function onYouTubePlayerAPIReady() {
	if(typeof element === 'undefined') 
		return; 
	for (var i = element.length - 1; i >= 0; i--) {
		video_source = element[i].getAttribute("data-video-source");
		video_id = element[i].getAttribute("data-video-id");
		el_width = element[i].offsetWidth;

		if (element[i].offsetHeight<((el_width/16)*9)) {
			el_height = (element[i].offsetWidth/16)*9;
		}else{
			el_height = element[i].offsetHeight;
			el_width = (el_height/9)*16;
		}
		if (el_width > 1920){
			el_quality = 'highres'; 
		}
		if (el_width < 1920){
			el_quality = 'hd1080'; 
		}
		if (el_width < 1280) {
			el_quality = 'hd720'; 
		}
		if (el_width < 853) {
			el_quality = 'large';
		}
		if (el_width < 640) {
			el_quality = 'medium';
		};

		window.setTimeout(function() {
			if (!YT.loaded) {
				console.log('not loaded yet');
				window.setTimeout(arguments.callee, 50)
			} else {
				var curplayer = video_control(video_id,video_source);				
			}
		}, 50);
	};
}
function video_control (uniqid,video_source) {
	var interval;
	var player;
	var chek = 0;
	
	player = new YT.Player(uniqid, {
		height: el_height,
		width: el_width,
		videoId: video_source,
		playerVars: {
			'autoplay' : 1,
			'rel' : 0,
			'showinfo' : 0,
			'showsearch' : 0,
			'controls' : 0,
			'loop' : 1,
			'enablejsapi' : 1,
			'theme' : 'dark',
			'modestbranding' : 0,
			'wmode' : 'transparent',
			'enablejsapi' : 1,
		},
		events: {
			'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
		}
	}
	);
	window.addEventListener('focus', function() {
		checkPlayer();
		return true;
	});
	function onPlayerReady(event){
		event.target.mute();
		player.setPlaybackQuality(el_quality);
		player.playVideo();		    
	}
	function onPlayerStateChange(event) {	
		event.data == YT.PlayerState.PLAYING ? 	interval = setInterval(checkPlayer, 200) :	clearInterval(interval);	
		setInterval(chek_on_page, 1000);
	}
	function seekTo(event) {
		player.seekTo(0);									
	}
	function checkPlayer() {	
		if (undefined !== player && undefined !== player.getCurrentTime) {
			currTime = player.getCurrentTime(); //get video position	
			duration = player.getDuration(); //get video duration
			(currTime > (duration - 0.8)) ? seekTo(event) : '';		
		};		
						
	}
	function chek_on_page (){
		if (document.getElementsByTagName('html')[0].hasAttribute('data-focus-chek')) {		
			if (chek < 1 && undefined !== player.playVideo) {
				chek++
				player.playVideo();
			}else{
				chek = 1
			}									
		}else if (undefined !== player.pauseVideo) {
			player.pauseVideo();
			chek = 0;
		}
	}
}
function Video_resizer (){
	if (element.length) {
		for (var i = element.length - 1; i >= 0; i--) {
			video_source = element[i].getAttribute("data-video-source");
			video_id = element[i].getAttribute("data-video-id");
			el_width = document.getElementsByClassName("cws_Yt_video_bg")[0].offsetWidth;

			

			if (element[i].offsetHeight<((el_width/16)*9)) {
				el_height = (document.getElementsByClassName("cws_Yt_video_bg")[0].offsetWidth/16)*9;
			}else{
				el_height = document.getElementsByClassName("cws_Yt_video_bg")[0].offsetHeight;
				el_width = (el_height/9)*16;
			}
			var el_iframe = document.getElementById(element[i].getAttribute("data-video-id"));
			el_iframe.style.width = el_width+'px';
			el_iframe.style.height = el_height+'px';
		};
	};
}

jQuery(document).ready(function (){
	

});
jQuery(window).resize( function (){
	/*Video_resizer ();	*/
} );
jQuery(window).load(function (){
	onYouTubePlayerAPIReady()
	/*Video_resizer ();*/

});






/* vimeo */

