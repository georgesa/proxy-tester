<?php

namespace App\Http\Controllers;

use App\Models\Lookup;
use App\Services\LookupInterface;
use Illuminate\Http\Request;

class LookupController extends Controller
{
    public function show()
    {
        return view('lookup-form', ['lookups' => Lookup::all()]);
    }

    public function lookup(Request $request, LookupInterface $lookup)
    {
        //set the form params
        $lookup->setParams($request->all());

        //make the query
        $lookup->test();

        //save the lookup
        $lookup->save();

        //return back
        return back()
            ->withInput($request->all())
            ->withErrors($lookup->getErrorMessage())
            ->with([
                'time' => $lookup->getResponseTime(),
                'code' => $lookup->getResponseCode(),
            ]);
    }
}
