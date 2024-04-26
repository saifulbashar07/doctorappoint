<?php
if (!function_exists('sumTwoNumbers')) {
    function sumTwoNumbers($a, $b)
    {
        return $a + $b;
    }
}
if (!function_exists('uploadDocument')) {
    function uploadDocument($folder,$req)
    {    
        $fileName = time().'.'.$req->file->extension();         
        $filepath = $req->file->move(public_path($folder), $fileName);
        return  $fileName;             
    }
}



?>