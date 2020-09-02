<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\DbDumper\Databases\MySql;

class AppController extends Controller
{
    public function index()
    {
        dd('/api/links');
    }

    public function dumpDatabase()
    {
        MySql::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile(storage_path('dump.sql'));
    }
}
