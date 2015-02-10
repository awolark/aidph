<?php namespace Aidph\Users;



use User;

class UserRepository {

    /**
     * Persist the user
     * @param User $user
     * @return bool
     */
    public function save(User $user)
    {
       return $user->save();
    }

} 