function enablerInitHandler(){
	jQuery.ajax({
		type:'POST',
		dataType:'jsonp',
		url:'http://forms.compassion.com/dashboards/feeds/feed.php',
		xhrFields: {withCredentials:false},
		success: function(n) {
			jQuery(document).ready(function(){
				jQuery("#btn").html('<a href="http://www.compassion.com/become-a-sponsor-dashboard/"><span class="img">See Who</span></a>');
				jQuery("#number").html('<span>'+n.length+'</span>');
				if(n[0].childImg === "img/skippy.jpg"){
					var a=1;
				}else{
					var a=0;
				}
				jQuery("#child").html('<div class="image"><img src="http://forms.compassion.com/dashboards/scrape/'+n[a].childImg+'"></div><div class="about"><strong>'+n[a].childName+'</strong><br>by '+n[a].childSponsor+' in '+n[a].childSponsorState+'</div>');
			});
		}
	});
}

function logoExitHandler(e) {
	Enabler.exitOverride('Logo Exit', 'http://www.compassion.com/become-a-sponsor-dashboard/');
}
if (Enabler.isInitialized()) {
	enablerInitHandler();
	document.getElementById('logo-link').addEventListener('click', logoExitHandler, false);
} else {
	Enabler.addEventListener(studio.events.StudioEvent.INIT, enablerInitHandler);
}