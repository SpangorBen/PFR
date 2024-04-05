<?php

namespace App\Repositories;

interface AdminRepositoryInterface
{
    public function getCompanyRequests();

    public function acceptCompanyRequest($requestId);

    public function getUsers();

    public function getUsersByCompany();

    public function banUser($userId);
}
