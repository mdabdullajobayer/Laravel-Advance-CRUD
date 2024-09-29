<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function getAllContacts()
    {
        return Contact::orderby('id', 'desc')->paginate(50);
    }

    public function createContact($data)
    {
        return Contact::create($data);
    }

    public function updateContact($id, $data)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($data);
        return $contact;
    }

    public function deleteContact($id)
    {
        $contact = Contact::findOrFail($id);
        return $contact->delete();
    }

    public function findContactById($id)
    {
        return Contact::findOrFail($id);
    }
}
