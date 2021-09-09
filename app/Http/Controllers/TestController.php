<?php

namespace App\Http\Controllers;

use Hash;

use App\User;
use App\Club;
use App\Section;
use App\Trainer;
use App\MainOrganisation;
use App\Helpers\DaData\Facades\DadataSuggest;

use Cog\Laravel\Ban\Services\BanService;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
       dd(app()->getLocale());
    }


}
