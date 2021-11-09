<?php
    if(!isset($_SESSION['user_id'])){ header("location: ."); }else{
        $level = $msc->getUser($_SESSION['user_id'])['level'];
        if($level == 0){ session_destroy(); header("location: ."); }
    }
