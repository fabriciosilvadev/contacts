@extends('template.layout')


@section('content')
    <div class="container">
        <h2 class="text-center mt-5 mb-3">Private Area</h2>
        <div class="card">
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
                <form action="{{ route('authentication') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-outline-primary mt-3">Login</button>
                </form>

            </div>
        </div>
    </div>
@endsection