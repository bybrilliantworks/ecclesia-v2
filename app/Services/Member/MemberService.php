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
    const FEMALE = 'female';
    const MALE = 'male';

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

    public function getCertifiedMemberChart()
    {
        $chart = new CertifiedMemberChart;
        $chart->labels(['Certified', 'Not Certified']);
        $members = $this->memberRepository->fetchAll()->toArray();
        $certifiedMembers = Arr::where($members, function ($member, $key) {
            return $member['membership_number'] !== '' && $member['membership_number'] !== null;
        });

        $notCertifiedMembers = Arr::where($members, function ($member, $key) {
            return $member['membership_number'] === '' || is_null($member['membership_number']);
        });

        $chart->dataset('Membership distribution by status', 'doughnut', [count($certifiedMembers), count($notCertifiedMembers)])
            ->backgroundColor(['#5DD6B4', '#D6516E']);

        return $chart;
    }

    public function getMemberGenderChart()
    {
        $chart = new CertifiedMemberChart;
        $chart->labels(['Female', 'Male']);
        $members = $this->memberRepository->fetchAll()->toArray();
        $femaleMembers = Arr::where($members, function ($member, $key) {
            return $member['gender'] === self::FEMALE;
        });

        $maleMembers = Arr::where($members, function ($member, $key) {
            return $member['gender'] === self::MALE;
        });

        $chart->dataset('Membership distribution by gender', 'doughnut', [count($femaleMembers), count($maleMembers)])
            ->backgroundColor(['#DD85BA', '#739ADD']);

        return $chart;
    }

    public function saveProfile(array $profileData): void
    {
        $member = $this->memberRepository->findByMobileNumber($profileData['mobile_number']);
        $profileData['name'] = $profileData['first_name'] . " " . $profileData['last_name'];
        if ($member) {
            $this->memberRepository->updateMember($profileData, $member->id);
        }

        if (!$member) {
            $profileData['church_id'] = 1;
            $this->memberRepository->createMember($profileData);
        }
    }

    private function buildMember(array $member): array
    {
        return [
            'name' => $member['first_name'] . " " . $member['last_name'],
            'first_name' => $member['first_name'],
            'last_name' => $member['last_name'],
            'email' => $member['email'],
            'address' => $member['address'],
            'birthday' => $member['birthday'],
            'marital_status' => $member['marital_status'],
            'church_id' => auth()->user()->church_id,
            'date_joined' => $member['date_joined'],
            'mobile_number' => $member['mobile_number'],
            'employment_status' => $member['employment_status'],
            'occupation' => $member['occupation'],
            'gender' => $member['gender'],
            'membership_number' => $member['membership_number'],
            'mode_of_invitation' => $member['mode_of_invitation'],
            'invited_by' => $member['invited_by'],
            'like_to_join_the_church' => $member['like_to_join_the_church'],
        ];
    }
}
