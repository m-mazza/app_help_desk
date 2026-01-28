<?php

    function retornoMensagem($state = false, $msg = '')
    {
        $url = '';
        if(!empty($state) && !empty($msg))
            $url = '?error='.$state.'&msg='.urlencode($msg);
               
        return $url;
    }

?>