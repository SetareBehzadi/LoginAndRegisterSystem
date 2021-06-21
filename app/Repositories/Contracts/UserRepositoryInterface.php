<?php
namespace App\Repositories\Contracts;


/*use App\Entities\User\UserEntity;*/
use App\Repositories\Contracts\RepositoryInterface;

interface UserRepositoryInterface  extends RepositoryInterface
{
    public function getActiveUsers();
    public function searchUsers(string $keyword);
    public function store(array $item);//:UserEntity;
}
