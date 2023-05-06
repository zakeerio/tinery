<?php

namespace App\Interfaces;

interface AdminInterface extends BaseInterface{
    public function findAdminById($id);
}