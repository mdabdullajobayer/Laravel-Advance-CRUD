  @extends('Layout.app')

  @section('content')
      <div class="container mt-5">
          <h2>{{ isset($contact) ? 'Edit Contact' : 'Create Contact' }}</h2>

          @if ($errors->any())
              <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif
          <form action="{{ isset($contact) ? route('contacts.update', $contact->id) : route('contacts.store') }}"
              method="POST">
              @csrf
              @if (isset($contact))
                  @method('PUT')
              @endif

              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name"
                      value="{{ old('name') }}  {{ isset($contact) ? $contact->name : '' }}">
              </div>

              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email"
                      value="{{ isset($contact) ? $contact->email : '' }}">
              </div>

              <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone"
                      value="{{ isset($contact) ? $contact->phone : '' }}">
              </div>

              <div class="form-group">
                  <label for="phone">Address</label>
                  <input type="text" class="form-control" id="Address" name="address"
                      value="{{ isset($contact) ? $contact->address : '' }}">
              </div>

              <button type="submit" class="btn btn-primary">
                  {{ isset($contact) ? 'Update' : 'Create' }}
              </button>
              <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
          </form>
      </div>
  @endsection
