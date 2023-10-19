<?php
 function js_alert($msg){
    echo "<script>alert('$msg')</script>";
    
 }
 function js_redirect($url){
    echo "<script>window.location='$url'</script>";
 }
