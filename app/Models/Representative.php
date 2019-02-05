<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $table = "representatives";

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'passport',
        'signer_first_name',
        'signer_last_name',
        'signer_middle_name',
        'company_full_name',
        'company_brief_name',
        'inn',
        'kpp',
        'ogrn',
        'type',
    ];

    /**
     * Get list of columns.
     *
     * @return array
     */
    public static function getColumnsNames()
    {
        return [
            'first_name',
            'last_name',
            'middle_name',
            'passport',
            'signer_first_name',
            'signer_last_name',
            'signer_middle_name',
            'company_full_name',
            'company_brief_name',
            'inn',
            'kpp',
            'ogrn',
            'type',
        ];
    }
}
