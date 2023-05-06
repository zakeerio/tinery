<?php

//format permissions (separate class and and action name)
function permissionFormater($permission)
{
    $permissionslist = [];
    foreach ($permission as $key => $permissionVal) {
        $permissionArr = explode('-', $permissionVal->name);
        if (count($permissionArr) > 1) {
            $permissionslist[$permissionArr[0]][] = $permissionArr[1] . '-' . $permissionVal->id;
        } else {
            continue;
        }
    }
    return $permissionslist;
}