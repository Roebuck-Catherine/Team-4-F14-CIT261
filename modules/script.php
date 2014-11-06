<!-- move CSS to top and JS to bottom -->

<link href="/style.css?<?php echo time();?>" rel="stylesheet" type="text/css" />

<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes" />

<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel="apple-touch-icon" href="/images/mobileIcon.png"/>

<link rel="apple-touch-startup-image" href="/images/startUpImage.png" />


<!--jQuery Slider Menu-->
<link type="text/css" rel="stylesheet" href="/jquery/src/css/jquery.mmenu.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/jquery/src/js/jquery.mmenu.js"></script>

<script type="text/javascript">
        $(function() {
                $('nav#menu').mmenu();
        });
</script>


<!-- Count Functions-->
<script type='text/javascript' src='/countScreen/countAlter.js'></script>


<script>
// Listen for ALL links at the top level of the document. For
// testing purposes, we're not going to worry about LOCAL vs.
// EXTERNAL links - we'll just demonstrate the feature.
$( document ).on(
    "click",
    "a",
    function( event ){
 
        // Stop the default behavior of the browser, which
        // is to change the URL of the page.
        event.preventDefault();
 
        // Manually change the location of the page to stay in
        // "Standalone" mode and change the URL at the same time.
        location.href = $( event.target ).attr( "href" );
 
    }
);    
</script>