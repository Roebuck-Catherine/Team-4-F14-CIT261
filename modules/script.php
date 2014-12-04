<!-- Count Screen Functions-->
<script type='text/javascript' src='/countScreen/countAlter.js'></script>

<!-- make functions faster for mobile (Removes 300ms delay on clicks)-->
<script type='application/javascript' src='/library/fastClick.js'></script>
    <script>
    window.addEventListener('load', function() {
        FastClick.attach(document.body);
    }, false);
    var attachFastClick = Origami.fastclick;
    attachFastClick(document.body);
    </script>
    
<!--Script to make links re-direct in web-app mode instead of opening in separate browser page-->
<script>
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