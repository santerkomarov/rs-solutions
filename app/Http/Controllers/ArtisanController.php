<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    public function index () {
        return view('artisan');
    }
    public function migrate () {
        \Artisan::call('migrate');
        $message = 'Migration done';
        $command = "\Artisan::call('migrate')";
        return view('artisan', compact('message', 'command'));
    }
    public function rollback () {
        \Artisan::call('migrate:rollback');
        $message = 'Migration rollbacked';
        $command = "\Artisan::call('migrate:rollback')";
        return view('artisan', compact('message', 'command'));
    }
}
