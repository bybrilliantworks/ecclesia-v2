<?php

namespace App\Repositories\Member;

use App\Member;

interface MemberRepositoryInterface
{
    public function fetchAll();

    public function getMember(int $id);

    public function updateMember(array $member, int $id): bool;

    public function createMember(array $member);

    public function findByMobileNumber(string $phoneNumber): ?Member;
}
