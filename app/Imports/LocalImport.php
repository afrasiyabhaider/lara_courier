<?php

namespace App\Imports;

use App\Local;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class LocalImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Local([
            'customer_name'     => $row[0],
            'customer_cnic'     => $row[1],
            'tracking_id'     => $row[2],
            'shipping_charged'     => (int) $row[3],
            'parcel_weight'     => (float) $row[4],
            'shipping_address'     => $row[5],
            'shipped_on'     => $row[6],
            // 'shipped_on'     => Carbon::parse(Carbon::create($row[6])->format('dd/M/y')),
            'deliver_in_days'     => (int) $row[7]
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}