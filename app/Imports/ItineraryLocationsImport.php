<?php

namespace App\Imports;

use App\Models\ItineraryLocations;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ItineraryLocationsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Process each row of data
            $address_street    =  $row[0];
            $address_street_line1  =  $row[1];
            $address_city  =  $row[2];
            $address_state =  $row[3];
            $address_zipcode   =  $row[4];
            $address_country   =  $row[5];
            $latitude  =  $row[6];
            $longitude =  $row[7];

            $data = new ItineraryLocations;
            $data->address_street    =  $row[0];
            $data->address_street_line1  =  $row[1];
            $data->address_city  =  $row[2];
            $data->address_state =  $row[3];
            $data->address_zipcode   =  $row[4];
            $data->address_country   =  $row[5];
            $data->latitude  =  $row[6];
            $data->longitude =  $row[7];
            $data->save();
            // Perform any necessary validation or manipulation of the data
            // For example, you can check if the email is valid or perform any transformations on the data
        }

    }

}
