<div id="menuButtonStyle"></div>
<div id="menuButton"><a href="#menu"></a></div> 

<!-- Navigation -->
<nav id="menu">
    <ul>
        <li class="Label">Main Menu</li>
        <?php if($_SESSION['is_logged_in'] == 1){?>
            <li><a href="/countScreen"><img class="menuImg" src="/images/count.png" alt="Calendar Image"/>Counter</a></li>
            <li><a href="/eventChoice"><img class="menuImg" src="/images/calendar.png" alt="Calendar Image"/>Event Choice Menu</a></li>
            <li><a href="#openReset"><img class="menuImg" src="/images/undo.png" alt="Reset Image"/>Reset Count to Zero</a></li>
            <li><a href="#openInterval"><img class="menuImg" src="/images/interval.png" alt="Interval Image"/>Change Count Interval</a></li>
            <li><a href="/"><img class="menuImg" src="/images/submit.png" alt="Submit Image"/>Submit Final Count</a></li>
            <li class="Spacer"></li>
            <li><a href="/accounts/?action=logout"><img class="menuImg" src="/images/White Lock.png" alt="Logout Image"/>Logout of Organization</a></li>
        <?php } else{ ?>
            <li><a href="/about"><img class="menuImg" src="/images/about.png" alt="about Tally"/>Learn About Tally</a></li>
            <li><a href="/"><img class="menuImg" src="/images/White Lock.png" alt="Logout Image"/>Account Login</a></li>
            <li class="Spacer"></li>
            <li style="line-height: 30px" class="Label">Don't Have an Account?</li>
            <li><a href="../accounts/createAccount.php"><img class="menuImg" src="/images/count.png" alt="Create Account Image"/>Create an Account</a></li>
        <?php } ?>
    </ul>
</nav>

<div id='openInterval' class='modalDialog'>
    <div>
        <a href ='#close' id="menuClose" title='Close' class='close'>Cancel</a>
        <h2>Interval</h2>
        <button class='button' onClick="changeInterval(1)">Count by 1</button>
        <button class='button' onClick="changeInterval(2)">Count by 2</button>
        <button class='button' onClick="changeInterval(3)">Count by 3</button>
        <button class='button' onClick="changeInterval(5)">Count by 5</button>
    </div>
</div>
<div id='openReset' class='modalDialog'>
    <div>
        <a href ='#close' title='Close' class='close'>Cancel</a>
        <h2>Reset Count</h2>
        <p>Are you sure you want to reset count to zero? </p>
        <button class='button' onClick="resetCount()">Reset count to Zero</button>
    </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>