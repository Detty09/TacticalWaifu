<?php

namespace App\Http\Controllers;

use App\Models\DereType;

class DereController extends Controller
{
    public function getDereTypes()
    {
        $deretypes = DereType::all();
        return view('deretypes.deretypes', compact('deretypes'));
    }

}
