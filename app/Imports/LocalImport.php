<?php

namespace App\Imports;

use App\Local;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class LocalImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $date = Date::excelToDateTimeObject($row[6]);
        return new Local([
            'customer_name'     => $row[0],
            'customer_cnic'     => $row[1],
            'tracking_id'     => $row[2],
            'shipping_charged'     => (int) $row[3],
            'parcel_weight'     => (float) $row[4],
            'shipping_address'     => $row[5],
            'shipped_on'     => $date->format('Y-m-d'),
            'deliver_in_days'     => (int) $row[7]
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
    public function startRow(): int
    {
        return 2;
    }
}