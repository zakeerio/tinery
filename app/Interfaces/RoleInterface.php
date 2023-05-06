<?php

namespace App\Interfaces;

interface RoleInterface extends BaseInterface{
    public function findRoleById($id);
}