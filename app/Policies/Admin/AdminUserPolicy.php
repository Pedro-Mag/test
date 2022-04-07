<?php

namespace App\Policies\Admin;

use App\Models\Admin\AdminUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    public function edit(AdminUser $user)
    {
        return $user->admin_role_id == 1;
    }
}
