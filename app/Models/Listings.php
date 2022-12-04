<?php

namespace App\Models;

class Listings {
    public static function all() {
        return [
            [
                'id' => 1,
                'title' => 'Listings One',
                'description' => "i can't think of any description!"
            ],
            [
                'id' => 2,
                'title' => 'Listings two',
                'description' => "Nothing to see here."
            ]
        ];
    }

    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}

?>