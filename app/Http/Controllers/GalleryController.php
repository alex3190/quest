<?php
/**
 * Created by PhpStorm.
 * User: MSI gs
 * Date: 9/15/2017
 * Time: 3:31 PM
 */

namespace App\Http\Controllers;


class GalleryController
{
    public function index() {

        $parsedCsv = array_map('str_getcsv', file('imageData.csv'));

        //gets tags per image
        foreach($parsedCsv as $image){
            $images = [];
            for($i=3; $i<=6; $i++){
                if(!empty($image[$i])){
                    $images[] = '"' . strtolower($image[$i]) . '"';
                    $allTags[] = strtolower($image[$i]);
                }

            }
            $finalItems[] = implode(', ', $images);

        }


        $csv = [
            'csv'=> $parsedCsv,
            'tags' => $finalItems,
            'uniqueTags' => array_unique($allTags)
        ];

//        dd($csv['uniqueTags']);
        return view('gallery.gallery', $csv);
    }
}