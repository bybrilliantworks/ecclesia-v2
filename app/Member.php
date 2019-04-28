<?php

namespace App;

use App\Scopes\ChurchScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Member extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'first_name',
        'church_id',
        'middlename',
        'last_name',
        'email',
        'mobile_number',
        'gender',
        'marital_status',
        'address',
        'age_group',
        'occupation',
        'birthday',
        'date_joined',
        'membership_number',
        'employment_status',
    ];

    public function validate(array $members)
    {
        return Validator::make($members, $this->rules);
    }

    protected static function boot()
    {
        parent::boot();
    }

    public function primaryDepartment()
    {
        $this->belongsTo('App\Group', 'primary_department_id');
    }

    public function secondaryDepartment()
    {
        $this->belongsTo('App\Group', 'secondary_department_id');
    }

}
