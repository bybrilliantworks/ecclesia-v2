<?php

namespace App\Imports;

use App\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MembersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $genderMap = ['M' => 'male', 'F' => 'female'];
        $employmentStatusMap = ['UNEMPLOYED' => 'unemployed', 'STUDENT' => 'student'];

        if (array_key_exists($row['occupation'], $employmentStatusMap)) {
            $employmentStatus = $employmentStatusMap[$row['occupation']];
        } else if (trim($row['occupation']) === '') {
            $employmentStatus = 'other';
        } else {
            $employmentStatus = 'employed';
        }

        return new Member([
            'name' => $row['surname'] . " " . $row['first_name'],
            'surname' => $row['surname'],
            'first_name' => $row['first_name'],
            'gender' => $row['sex'] ? $genderMap[$row['sex']] : 'other',
            'email' => strtolower($row['email']),
            'church_id' => auth()->user()->church_id,
            'address' => $row['address'] ? $row['address'] : 'Not Available',
            'neighbourhood' => $row['area'],
            'mobile_number' => $row['mobile_number'] ? $row['mobile_number'] : 'Not Available',
            'state' => $row['state'],
            'marital_status' => $row['relationship_status'] ? $row['relationship_status'] : 'Not Available',
            'employment_status' => $employmentStatus,
            'occupation' => $row['occupation'],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
