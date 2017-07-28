var _gaq=[];

function Analytics(){
	_gaq.push(['_setAccount','UA-103616256-1'],['_trackPageview']);
	this.create();
};

Analytics.prototype.mailTrack = function(){
	_gaq.push(['_trackEvent','Mail','SendMail']);
};


Analytics.prototype.errorMailTrack = function(){
	_gaq.push(['_trackEvent','Mail','SendMail', 'Error']);
};

Analytics.prototype.okMailTrack = function(){
	_gaq.push(['_trackEvent','Mail','SendMail', 'OK']);
};

Analytics.prototype.create= function(){
	var g = document.createElement('script');
	var script = document.getElementsByTagName('script')[0];
	g.type = 'text/javascript';
 	g.async = true;
 	g.src = '//www.google-analytics.com/ga.js';
 	script.parentNode.insertBefore(g, script);
};

Analytics.prototype.pageTrack = function(pageId){
	_gaq.push(['_trackPageview',pageId]);
};

// Create analitics instance
var analytics = new Analytics();

$('#inicio').click(function() {
    analytics.pageTrack("inicio");
});
$('#quienessomos').click(function() {
    analytics.pageTrack("quienessomos");
});
$('#servicios').click(function() {
    analytics.pageTrack("servicios");
});
$('#contacto').click(function() {
    analytics.pageTrack("contacto");
});