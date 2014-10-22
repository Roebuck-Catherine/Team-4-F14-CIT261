<div id="menuButtonStyle">Menu</div>
<div id="menuButton"><a href="#menu"></a></div> 

<!-- Navigation -->
<nav id="menu">
    <ul>
        <li class="Label">Main Menu</li>
        <?php if($_SESSION['is_logged_in'] == 1){?>
            <li><a href="/countScreen"><img class="menuImg" src="/images/count.png" alt="Calendar Image"/>Counter</a></li>
            <li><a href="/"><img class="menuImg" src="/images/calendar.png" alt="Calendar Image"/>Event Menu</a></li>
            <li><a href="/"><img class="menuImg" src="/images/undo.png" alt="Reset Image"/>Reset Count</a></li>
            <li><a href="/"><img class="menuImg" src="/images/interval.png" alt="Interval Image"/>Change Interval</a></li>
            <li><a href="/"><img class="menuImg" src="/images/submit.png" alt="Submit Image"/>Submit Count</a></li>
            <li class="Spacer"></li>
            <li><a href="/accounts/?action=logout"><img class="menuImg" src="/images/White Lock.png" alt="Logout Image"/>Logout</a></li>
        <?php } else{ ?>
            <li><a href="/about"><img class="menuImg" src="/images/about.png" alt="about Tally"/>Learn About Tally</a></li>
            <li><a href="/"><img class="menuImg" src="/images/White Lock.png" alt="Logout Image"/>Login</a></li>
            <li><a href="../accounts/createAccount.php"><img class="menuImg" src="/images/count.png" alt="Create Account Image"/>Create Account</a></li>
        <?php } ?>    
    </ul>
</nav>