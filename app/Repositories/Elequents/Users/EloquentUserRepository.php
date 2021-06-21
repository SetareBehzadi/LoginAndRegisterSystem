<?php

namespace App\Repositories\Eloquent\Users;


/*use App\Entities\User\EloquentUserEntityMapper;
use App\Entities\User\UserEntity;*/
use App\Models\User;
use App\Repositories\Contracts\EloquentBaseRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface
{
    protected $model = User::class;
    public function getActiveUsers()
    {
        // TODO: Implement getActiveUsers() method.
    }
    public function searchUsers(string $keyword)
    {
        return $this->model::where('name','like',"%$keyword%")
            ->orWhere('email','like',"%$keyword%")->get(['id','name as text']);
    }
    public function store(array $item)//:UserEntity
    {
        $newUser = $this->model::create($item);
        return $newUser;
//        return new EloquentUserEntityMapper($newUser);
    }
}
