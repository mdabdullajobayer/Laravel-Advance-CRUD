<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAllContacts();
        return view('contacts.index', compact('contacts', 'count'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(ContactFormRequest $request)
    {
        $data = $request->all();
        $this->contactService->createContact($data);
        return to_route('contacts.index')->with('success', 'Created Successfully!');
    }

    public function edit($id)
    {
        $contact = $this->contactService->findContactById($id);
        return view('contacts.create', compact('contact'));
    }

    public function update(ContactFormRequest $request, $id)
    {
        $data = $request->all();
        $this->contactService->updateContact($id, $data);
        return redirect()->route('contacts.index')->with('success', 'Update Successfully!');
    }

    public function destroy($id)
    {
        $this->contactService->deleteContact($id);
        return redirect()->route('contacts.index')->with('success', 'Delete Successfully!');
    }
}
