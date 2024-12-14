@extends('template.layout')

@section('content')
<div class="container">
        <h2 class="text-center mt-5 mb-3">Your Contacts</h2>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                @auth
                <a class="btn btn-outline-primary" href="{{ route('contacts.create') }}">
                    Create New Contact
                </a>
                @endauth

                <div class="d-flex justify-content-between">

                    @if(!\Illuminate\Support\Facades\Auth::check())
                    <div>
                        <a class="btn btn-secondary"  href="{{ route('login') }}">
                            Private Area
                        </a>
                    </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::check())
                        <p style="margin: 10px">Welcome, {{auth()->user()->name}}</p>
                    @endif

                    @auth
                    <a class="btn btn-danger" href="{{ route('logout') }}">
                        Logout
                    </a>
                    @endauth
                </div>
            </div>
            <div class="card-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <b>{{ $message }}</b>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-success">
                        <b>{{ $message }}</b>
                    </div>
                @endif


                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>E-mail</th>
                        <th width="15%">Actions</th>
                    </tr>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a
                                    class="btn btn-info btn-sm"
                                    href="{{ route('contacts.show',$contact->id) }}">
                                    Show
                                </a>
                                @auth
                                <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                                <a
                                    class="btn btn-outline-success btn-sm"
                                    href="{{ route('contacts.edit',$contact->id) }}">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                                @endauth
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <div class="mb-2 d-flex flex-column align-items-center">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
