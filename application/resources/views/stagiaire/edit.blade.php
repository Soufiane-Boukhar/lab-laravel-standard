@extends('layout.layout')
@extends('layout.nav')
@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="mt-5 bg-success p-4">
        <span class="font-medium text-light">{{ session('success') }}</span>
    </div>
@endif

<div class="container d-flex justify-content-center">

    <form class="mt-5 w-50" action="{{ route('stagiaires.update', ['id'=>$stagiaire->id]) }}" method="post">
        @csrf 
        @method('PUT')
        <div class="form-outline mb-4">
            <label class="form-label" for="form4Example1">Name</label>
            <input type="text" id="form4Example1" class="form-control" name="name" value="{{$stagiaire->name}}"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form4Example2">Email address</label>
            <input type="email" id="form4Example2" class="form-control" name="email" value="{{$stagiaire->email}}"/>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Editer</button>
    </form>
</div>

@endsection