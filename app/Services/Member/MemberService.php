<?php

namespace App\Services\Member;

use App\Charts\CertifiedMemberChart;
use App\Member;
use App\Repositories\Member\MemberRepositoryInterface as MemberRepository;
use App\Services\Member\MemberServiceInterface;
use Illuminate\Support\Arr;

class MemberService implements MemberServiceInterface
{
    private $memberRepository;
    const MARRIED = 'married';
    const SINGLE = 'single';

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function getAggregates(): array
    {
        $members = $this->memberRepository->fetchAll()->toArray();
        $married = Arr::where($members, function ($member, $key) {
            return strtolower($member['marital_status']) === self::MARRIED;
        });

        $single = Arr::where($members, function ($member, $key) {
            return strtolower($member['marital_status']) === self::SINGLE;
        });

        return ['married' => count($married), 'single' => count($single), 'total' => count($members)];
    }

    public function fetchAll()
    {
        return $this->memberRepository->fetchAll();
    }

    public function getMember(int $id): Member
    {
        return $this->memberRepository->getMember($id);
    }

    public function createMember(array $memberData): Member
    {
        $member = $this->buildMember($memberData);

        return $this->memberRepository->createMember($member);
    }

    public function updateMember(array $memberData, int $id): bool
    {
        $member = $this->buildMember($memberData);

        return $this->memberRepository->updateMember($member, $id);
    }

    private function buildMember(array $member): array
    {
        return [
            'name' => $member['firstName'] . " " . $member['lastName'],
            'first_name' => $member['firstName'],
            'last_name' => $member['lastName'],
            'email' => $member['email'],
            'address' => $member['address'],
            'birthday' => $member['birthday'],
            'marital_status' => $member['maritalStatus'],
            'church_id' => auth()->user()->church_id,
            'date_joined' => $member['dateJoined'],
            'mobile_number' => $member['mobileNumber'],
            'employment_status' => $member['employmentStatus'],
            'occupation' => $member['occupation'],
            'gender' => $member['gender'],
            'membership_number' => $member['membershipNumber'],
        ];
    }

    public function getCertifiedMemberChart()
    {
        $chart = new CertifiedMemberChart;
        $chart->labels(['Certified', 'Not Certified']);
        $chart->dataset('Members distribution by certified number', 'bar', [1, 2])->backgroundColor(['#5DD6B4', '#D6516E']);
        return $chart;
    }
}
