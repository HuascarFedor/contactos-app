<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$contacts = Contact::all();
        //$contacts = Contact::paginate(6);
        $contacts = Contact::where('user_id', auth()->id())->paginate(6);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('contacts.store');
        return view('contacts.create', compact('route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|unique:contacts',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $path = 'public/no-image.jpg';
        if($request->hasFile('image'))
            $path = $request->image->store('public');

        $contact = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => $path
        ]);
        $contact->save();
        
        return redirect()->route('contacts.index')
        ->with('succes', 'Contacto añadido exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $route = route('contacts.update', ['contact'=>$contact]);
        $update = true;
        return view('contacts.edit', compact('route', 'update', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|unique:contacts,phone,'.$contact->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if($request->hasFile('image')){
            $contact->deleteImage();
            $path = $request->image->store('public');
        }
        else
            $path = $contact->name;

        $contact->fill([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => $path
        ]);
        $contact->save();
        
        return redirect()->route('contacts.index')
        ->with('succes', 'Contacto modificado exitosamente.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->deleteImage();
        $contact->delete();
        return redirect()->route('contacts.index')
        ->with('succes', 'Contacto eliminado exitosamente.');        
    }
}
