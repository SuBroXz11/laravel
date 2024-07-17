<?php

namespace App\Models;

class Listing {
    // All Listing
    public static function all(){
        return [
            [
                'id'=>1,
                'title'=>'Listing One',
                'description'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium quas vitae in laboriosam. Ipsam ea amet unde molestias, odit labore odio assumenda illo tenetur porro harum adipisci voluptatem corrupti dolor.'
            ],
            [
                'id'=>2,
                'title'=>'Listing Two',
                'description'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium quas vitae in laboriosam. Ipsam ea amet unde molestias, odit labore odio assumenda illo tenetur porro harum adipisci voluptatem corrupti dolor.'
            ],
        ];
    }

    // Single Listing
    public static function find($id){
        $listings = self::all();
        foreach($listings as $listing){
            if($listing['id']==$id){
                return $listing;
            }
        }
    }
}