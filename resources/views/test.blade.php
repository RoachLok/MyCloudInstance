    <h1>HI</h1>

    <p>
        <?php
            use Http\Controllers\UserLogs;
            echo Auth::user()->name.'<br>'.Auth::user()->id.'<br>';
        ?>
    </p>
