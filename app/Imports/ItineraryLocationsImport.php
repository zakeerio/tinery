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
        
            $existingData = ItineraryLocations::where('address_street', $address_street)
                ->where('address_street_line1', $address_street_line1)
                ->where('address_city', $address_city)
                ->where('address_state', $address_state)
                ->where('address_zipcode', $address_zipcode)
                ->where('address_country', $address_country)
                ->first();
        
            if ($existingData) {
                continue; // Skip if the entry already exists
            }
        
            $data = new ItineraryLocations;
            $data->address_street    =  $address_street;
            $data->address_street_line1  =  $address_street_line1;
            $data->address_city  =  $address_city;
            $data->address_state =  $address_state;
            $data->address_zipcode   =  $address_zipcode;
            $data->address_country   =  $address_country;
            $data->latitude  =  $latitude;
            $data->longitude =  $longitude;
            $data->save();
            
            // Perform any necessary validation or manipulation of the data
            // For example, you can check if the email is valid or perform any transformations on the data
        }

    }

}
