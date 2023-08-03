<?php

use App\Models\MenuList;

if(!function_exists('getMainMenus')){
    function getMainMenus()
    {
        return MenuList::with('SubMenu')->whereNull('parent_id')->get();
    }
}

if(!function_exists('checkMenu')){
    function checkMenu()
    {
        if(true){

        }else{
            
        }
    }
}