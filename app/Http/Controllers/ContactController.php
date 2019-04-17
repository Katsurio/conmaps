<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreateContactRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateContactRequest $request
     * @return RedirectResponse|Response
     */
    public function store(CreateContactRequest $request)
    {
        try {
            $contact = Contact::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'birthday' => date('Y-m-d', strtotime($request['birthday'])),
                'address' => $request['address'],
                'city' => $request['city'],
                'state' => $request['state'],
                'zip' => $request['zip'],
            ]);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return Redirect::back()->withErrors('Duplicate Email. Please select a different email.')->withInput();
            }
        }
        return redirect('/contacts')->with('success', 'Contact Saved.')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $id
     * @return Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
