<?php

namespace App\Imports;

use App\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Member([
            'name' => $row[1],
            'date_of_birth' => $row[2],
            'email' => strtolower($row[8]),
            'church_id' => auth()->user()->church_id,
            'age_group' => $row[5],
            'certified_code' => $row[4],
            'address' => $row[13],
            'mobile_number' => $row[6],
            'marital_status' => $row[16],
            'occupation' => $row[20],
            'birthday' => date('Y-m-d', strtotime($row[2])),
            'gender' => strtolower($row[3]),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
