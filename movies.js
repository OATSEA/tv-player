function setup() {
	
	$(window).load(function(){
	    $('.myfig').imagefit();
		$('.mybutton').imagefit();	
	});
	
	
	/*
	document.ontouchmove = function(event) {
	// prevent screen scroll / bounce for iOS devices
	event.preventDefault();	
	} 
	*/
	
	// Setup watcher for exit full screen so that we can pause the video when exit full screen
	// $('.videoclip').css( "border", "3px solid red" );
	$('.videoclip').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
		var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
	    // var event = state ? 'FullscreenOn' : 'FullscreenOff';

	    if (state==false) {
			//alert('Event: ' + state);
	    	$('.videoclip').each( function() { 
					$(this).get(0).pause(); }
			);
			$('#overlay').addClass('hideMe');
			// $('.videoclip').get(0).pause();
	    }// Now do something interesting
	        
	});	
} // END setup
$('body').keypress(function(e){
   
    if (keyCode == 27)
{
    history.back();

    if (window.event)
    {
        // IE works fine anyways so this isn't really needed
        e.cancelBubble = true;
        e.returnValue = false;
    }
    else if (e.stopPropagation)
    {
        // In firefox, this is what keeps the escape key from canceling the history.back()
        e.stopPropagation();
        e.preventDefault();
    }

    return (false);
}
});
		
function playvid(value) {
	var video = document.getElementById(value);
       // alert(video)
	if(video.paused){
        //alert(video.played)
     // video.currentTime=500;
                jQuery( document ).ready(function($) {
                $(value).click(function() {
                $(this).get(0).paused ? $(this).get(0).play() : $(this).get(0).pause();
           });
              });   
                   $('#overlay').addClass('hideMe');
                if (video.requestFullscreen) {
                    video.requestFullscreen();
                  } else if (video.mozRequestFullScreen) {
                    video.mozRequestFullScreen();
                  } else if (video.webkitRequestFullscreen) {
                    video.webkitRequestFullscreen();
                  }
       } else   {
                   
		   $('#overlay').removeClass('hideMe');
                   $("#"+value).removeClass("showVideo");
		   //video.webkitExitFullScreen();
                }
	
	// make this button highlighted to indicate played
	var button = value+"_icon";
        $('#'+button).addClass("played");
        
      
} // END playvid

function videoEnded(value) {
	// alert(value);
       
	var video = document.getElementById(value);
        //video.webkitExitFullScreen();
        

} // END playvid

function doBack() {

	$('#overlay').addClass('hideMe');
        
	var doc = window.document;
  var docEl = doc.documentElement;

  var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
  var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

  if(!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
    requestFullScreen.call(docEl);
  }
  else {
    cancelFullScreen.call(doc);
  }

} // END playvid

function toggleView() {
	/* alert("Toggle View"); */
	$('.mycaption').toggleClass('hideMe');
	$('.imgtitle').toggleClass('hideMe');
	/* $('.myfig').toggleClass('smallmyfig'); */
	
} // END toggleView

function catToggle(value) {
	// alert(value);
		
		/*$('.videoicon').hide();
		$('.imgtitle').hide();
		$('.videoclip').hide();*/
		
		if (value=="All") {
			$('.myfig').show(); 
		} else {
			//$('.myfig').hide(); 
                        $('.myfig').show();
		}
                $.ajax({
                  type: "POST",
                  url: "list.php",
                  data: { folder_name: value }
                })
                  .done(function( data ) {
                    $("#maincontent").html(data);
                  });
		$('.mybutton').removeClass("played");
		$('#'+value+'_nav').addClass("played");
		
		var display = value.replace("-", " ");
		
	$('#moviecat').text(display);
	$('#moviecat').css('textTransform', 'capitalize');
	
}