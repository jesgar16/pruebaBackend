<?php

namespace App\Http\Controllers;


class RolController extends Controller
{
    /**
     * valida the specified resource from storage.
     *
     * @param  array  $roles
     * @return \Illuminate\Http\Response
     */
    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    /**
     * valida the specified resource from storage.
     *
     * @param  array  $roles
     * @return \Illuminate\Http\Response
     */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                 return true;
            }
        }
        return false;
    }

    /**
     * valida the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function hasRole($rol_id)
    {
        if ($this->roles()->where('id', $rol_id)->first()) {
            return true;
        }
        return false;
    }
}
