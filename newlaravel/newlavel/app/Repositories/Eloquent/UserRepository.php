<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends MasterRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
