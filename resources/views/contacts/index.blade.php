@extends('template.layout')

@section('content')
<div class="container">
        <h2 class="text-center mt-5 mb-3">Your Contacts</h2>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a class="btn btn-outline-primary" href="{{ route('contacts.create') }}">
                    Create New Contact
                </a>

                <div class="d-flex justify-content-between">

                    <div style="margin: 10px !important;">
                        @if(!\Illuminate\Support\Facades\Auth::check())
                            <a class="btn btn-secondary"  href="{{ route('login') }}">
                                Private Area
                            </a>
                        @endif
                    </div>


                @if(\Illuminate\Support\Facades\Auth::check())
                    <p>Welcome, {{auth()->user()->name}}</p>
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
                        <th width="240px">Actions</th>
                    </tr>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                                <a
                                    class="btn btn-info"
                                    href="{{ route('contacts.show',$contact->id) }}">
                                    Show
                                </a>
                                @auth
                                <a
                                    class="btn btn-outline-success"
                                    href="{{ route('contacts.edit',$contact->id) }}">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                @endauth
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <!-- Links de paginação -->
                <div class="d-flex flex-column align-items-center">
                <div class="mb-2">
                    <!-- Exibe o texto de paginação -->
                    Mostrando {{ $contacts->firstItem() }} a {{ $contacts->lastItem() }} de {{ $contacts->total() }} resultados
                </div>
                <!-- Links de paginação -->
                <div>
                    {{ $contacts->links('pagination::bootstrap-5') }}
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
