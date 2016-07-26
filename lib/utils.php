
<?php

require_once("../config.php");


/**
 * a fake secure function.. too hacky, too simple
 * @param  string $token a string left for the user to input
 * @return int        0 means success, 1 means failure
 */
function fake_secure($token){
    if($token === FAKE_TOKEN){
        return 0;
    }
    return 1;
    
}
?>

