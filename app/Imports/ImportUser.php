<?php

namespace App\Imports;

use App\Models\WebStudentsSubmit;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new WebStudentsSubmit([
                'name' => $row[0],
                'email' => $row[1],
                'password' => bcrypt($row[2]),
        ]);
    }
}
