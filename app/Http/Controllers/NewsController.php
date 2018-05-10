<?php
/**
 * Created by PhpStorm.
 * User: alexandrab
 * Date: 10/05/2018
 * Time: 15:05
 */

namespace App\Http\Controllers;


class NewsController
{
    public function index() {
        return view('news.news');
    }

}