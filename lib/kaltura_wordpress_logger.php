<?php 
class KalturaWordpressLogger 
{
    function log($str) 
    {
        if (KALTURA_LOGGER)
        {
            print(strip_tags($str)."<br />\n");
        }
    }
}
?>