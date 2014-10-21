<div id="menuButtonStyle">Menu</div>
<div id="menuButton"><a href="#menu"></a></div> 

<!-- Navigation -->
<nav id="menu">
    <ul>
        <li class="Label">Main Menu</li>
        <li><a href="/countScreen"><img class="menuImg" src="/images/count.png" alt="Calendar Image"/>Counter</a></li>
        <li><a href="/"><img class="menuImg" src="/images/calendar.png" alt="Calendar Image"/>Event Menu</a></li>
        <li><a href="/"><img class="menuImg" src="/images/undo.png" alt="Reset Image"/>Reset Count</a></li>
        <li><a href="/"><img class="menuImg" src="/images/interval.png" alt="Interval Image"/>Change Interval</a></li>
        <li><a href="/"><img class="menuImg" src="/images/submit.png" alt="Submit Image"/>Submit Count</a></li>
        <li class="Spacer"></li>
        <li>
            <a <?php 
            if($_SESSION['is_logged_in'] == 1){
                echo 'href="/accounts/?action=logout"';     
            } 
            else{
                echo 'href="/"';
            }
            ?>><img class="menuImg" src="/images/White Lock.png" alt="Logout Image"/>
            <?php 
            if($_SESSION['is_logged_in'] == 1){
                echo 'Logout';
            }
            else{
                echo 'Account Login';
            }
            ?></a></li>
    </ul>
</nav>