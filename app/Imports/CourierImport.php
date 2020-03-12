<?php

namespace App\Imports;

use App\Courier;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CourierImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $date = Date::excelToDateTimeObject($row[7]);
        return new Courier([
            'customer_name'     => $row[0],
            'customer_cnic'     => $row[1],
            'tracking_id'     => $row[2],
            'shipping_charged'     => (int) $row[3],
            'shipping_paid'     => (int) $row[4],
            'parcel_weight'     => (float) $row[5],
            'shipping_address'     => $row[6],
            'shipped_on'     => $date->format('Y-m-d'),
            'deliver_in_days'     => (int) $row[8]
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