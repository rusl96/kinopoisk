<?php
namespace frontend\repositories;
use common\entities\User;

class UserRepository extends IRepository
{

    public function __construct(User $user)
    {
        $this->type = $user;
    }

}
