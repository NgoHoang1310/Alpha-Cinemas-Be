<?php
function sideBarActived($url)
{
    if ($_SERVER['REQUEST_URI'] == $url) {
        return 'sidebar-active';
    }
}
