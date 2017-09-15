<?php
/**
 * Created by PhpStorm.
 * User: MSI gs
 * Date: 9/15/2017
 * Time: 3:31 PM
 */

namespace App\Http\Controllers;


class NewsController
{
    public function index() {
        return view('news.news');
    }
}