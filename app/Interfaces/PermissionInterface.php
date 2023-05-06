<?php

namespace App\Interfaces;

interface PermissionInterface extends BaseInterface{
    public function findPermissionById($id);
}