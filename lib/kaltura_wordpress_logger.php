<?php 
class KalturaWordpressLogger 
{
    function log($str) 
    {
        if (KALTURA_LOGGER && current_user_can('manage_options'))
        {
            print(strip_tags($str)."<br />\n");
        }
    }
}
?>