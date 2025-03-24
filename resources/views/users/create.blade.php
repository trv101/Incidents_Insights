@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white shadow rounded mt-8">
        <h1 class="text-2xl font-bold mb-4">Create User</h1>
        <a href="{{ route('users.index') }}" 
        class="inline-block px-4 py-2 bg-yellow-400 text-black font-semibold rounded-md shadow hover:bg--white transition mb-4">
        Back</a>
        
        <form method="POST" action="{{route('users.store')}}">
            @csrf
            
            <div class="mt-2">
                <label>Name:</label> <br>
                <input type="text" name="name" class="form.control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">
                <label>Email:</label><br>
                <input type="email" name="email" class="form.control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">
                <label>Password:</label><br>
                <input type="password" name="password" class="form.control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">
                <button class="btn btn-success inline-block px-4 py-2 bg-yellow-400 text-black font-semibold rounded-md shadow hover:bg--white transition mb-4"> Submit </button>
            </div>
        </form>
        
        
    </div>
@endsection
