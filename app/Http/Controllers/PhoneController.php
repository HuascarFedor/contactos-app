<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'number' => 'required',
        ]);
        $phone = Phone::create([
            'description' => $request->description,
            'number' => $request->number,
            'contact_id' => $request->contact_id
        ]);
        $phone->save();
        return back()->with("success", __("Added phone"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        $phone->delete();
        return back()->with("success", __("Deleted phone"));
    }
}
