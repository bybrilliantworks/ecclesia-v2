<?php

namespace App\Imports;

use App\Member;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;

class MembersImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable, SkipsFailures;
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
            'name' => $row['name'] ? $row['name'] : $row['surname'] . " " . $row['first_name'],
            'surname' => $row['surname'],
            'first_name' => $row['first_name'],
            'gender' => $row['gender'] ? $genderMap[$row['gender']] : 'other',
            'email' => strtolower($row['email']),
            'church_id' => auth()->user()->church_id,
            'address' => $row['address'] ? $row['address'] : 'Not Available',
            'neighbourhood' => $row['neighbourhood'],
            'mobile_number' => $row['mobile_number'] ? $row['mobile_number'] : 'Not Available',
            'state' => $row['state'],
            'marital_status' => $row['marital_status'] ? $row['marital_status'] : 'Not Available',
            'employment_status' => $employmentStatus,
            'membership_number' => $row['membership_number'],
            'occupation' => $row['occupation'],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }

    public function onFailure(Failure...$failures)
    {
        // Handle the failures how you'd like.
    }

    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }
}
