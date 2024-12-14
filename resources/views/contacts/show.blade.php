@extends('template.layout')


@section('content')
    <div class="container">
        <h2 class="text-center mt-5 mb-3">Show Contact {{$contact->name}}</h2>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a class="btn btn-outline-primary float-right" href="{{ route('contacts.index') }}">
                    View All Contacts
                </a>

                <div>
                @auth
                <a
                    class="btn btn-outline-success"
                    href="{{ route('contacts.edit',$contact->id) }}">
                    Edit
                </a>
                <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                @endauth
                </div>
            </div>
            <div class="card-body">
               <b class="text-muted">Name:</b>
               <p>{{$contact->name}}</p>

               <b class="text-muted">Contact:</b>
               <p>{{$contact->contact}}</p>

               <b class="text-muted">E-mail:</b>
               <p>{{$contact->email}}</p>
            </div>
        </div>
    </div>
@endsection
