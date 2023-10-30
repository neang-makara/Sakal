<?php

namespace App\Exports;

use App\Models\WebStudentsSubmit;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return WebStudentsSubmit::select([
                                    "data_obj->name as new_name",
                                    "data_obj->gender as new_gender",
                                    "data_obj->phone as new_phone",
                                    "skill_text",
                                    "result",
                                    "created_at",
                                ])->get();
    }
}
