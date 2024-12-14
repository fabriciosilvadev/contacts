<?php

namespace App\Http\Controllers;

use App\Domains\Contact\Actions\CreateContactAction;
use App\Domains\Contact\Actions\UpdateContactAction;
use App\Domains\Contact\Data\CreateContactData;
use App\Domains\Contact\Data\UpdateContactData;
use App\Domains\Contact\Queries\PaginationQuery;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Database\DatabaseManager;

class ContactController extends Controller
{
    public function __construct(
        private DatabaseManager $db,
        private PaginationQuery $paginationQuery)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = $this->paginationQuery->handle();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContactRequest $request,
                          CreateContactAction $action,
                          CreateContactData $data)
    {

        $contact = $this->db->transaction(
            fn () => $action->handle($data->from([
                ...$request->validated(),
            ]))
        );

        if ($contact){
            return redirect()->route('contacts.index')
                ->with('success','Contact created with successfully!');
        }else{
            return redirect()->route('contacts.create')
                ->with('error','There was an error. Please try again!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);

        return view('contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);

        return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request,
                           UpdateContactAction $action,
                           UpdateContactData $data,
                           Contact $contact)
    {
        $validated = $request->validated();

        $db = $this->db->transaction(
            fn () => $action->handle($data->from([
                ...$validated,
                'id' => $contact->id
            ]))
        );

        if ($db){
            return redirect()->route('contacts.index')
                ->with('success','Contact updated with successfully!');
        }else{
            return redirect()->route('contacts.update', $contactItem->id)
                ->with('error','There was an error. Please try again!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = Contact::find($id)->delete();

        if($db){
            return redirect()->route('contacts.index')
                ->with('success','Contact deleted successfully!');
        }else{
            return redirect()->route('contacts.index', $id)
                ->with('error','There was an error. Please try again!!');
        }

    }
}
