<?php

namespace App\Imports;

use App\Models\ItineraryLocations;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

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

            $existingData = DB::table('itinerary_locations')
                ->where('address_street', $address_street)
                ->where('address_street_line1', $address_street_line1)
                ->where('address_city', $address_city)
                ->where('address_state', $address_state)
                ->where('address_zipcode', $address_zipcode)
                ->where('address_country', $address_country)
                ->first();

            if ($existingData) {
                continue; // Skip if the entry already exists
            }

            DB::table('itinerary_locations')->insert([
                'address_street' => $address_street,
                'address_street_line1' => $address_street_line1,
                'address_city' => $address_city,
                'address_state' => $address_state,
                'address_zipcode' => $address_zipcode,
                'address_country' => $address_country,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);
        }

    }

}
