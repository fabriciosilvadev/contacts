@extends('template.layout')


@section('content')
    <div class="container">
        <h2 class="text-center mt-5 mb-3">Create New Contact</h2>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-primary float-right" href="{{ route('contacts.index') }}">
                    View All Contacts
                </a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <button type="submit" class="btn btn-outline-primary mt-3">Save Contact</button>
                </form>

            </div>
        </div>
    </div>
@endsection
