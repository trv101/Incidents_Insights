@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
                
                <!-- Button Container with Flexbox for alignment -->
                <div class="mt-6 space-y-4 sm:flex sm:space-y-0 sm:space-x-4 sm:items-center">
                    @can('role-list')
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a>
                        </button>
                    @endcan

                    @if(auth()->user()->hasRole('Admin'))
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <a class="nav-link" href="{{ route('users.index') }}">Manage Users</a>
                        </button>
                    @endif

                    @can('incident-list')
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <a class="nav-link" href="{{ route('incidents.index') }}">Manage Incidents</a>
                        </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-8xl mx-auto p-6 bg-white shadow rounded mt-8">
            <a href="{{ route('incidents.create', ['from_dashboard' => 'true']) }}" 
                class="bg-green-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-green-700 transition">
                + Report Incident
             </a>
             

            <h1 class="text-2xl font-bold mt-4 mb-4">Your Incidents</h1>

            <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">Title</th>
                        <th class="p-2 border">Category</th>
                        <th class="p-2 border">Priority</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Reported Date</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidents as $incident)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border">{{ $incident->id }}</td>
                            <td class="p-3 border">{{ $incident->title }}</td>
                            <td class="p-3 border">{{ $incident->category }}</td>
                            <td class="p-3 border 
                                @if($incident->priority == 'High') bg-red-500/80
                                @elseif($incident->priority == 'Medium') bg-orange-500/80
                                @elseif($incident->priority == 'Low') bg-green-500/80
                                @endif">
                                {{ $incident->priority }}
                            </td>
                            <td class="p-3 border 
                                @if($incident->status == 'Resolved') bg-green-500/80
                                @elseif($incident->status == 'In Progress') bg-yellow-500/80
                                @elseif($incident->status == 'On Hold') bg-purple-500/80
                                @elseif($incident->status == 'Escalated') bg-red-500/80
                                @elseif($incident->status == 'Open') bg-blue-500/80
                                @endif">
                                {{ $incident->status }}
                            </td>
                            <td class="p-3 border">{{ $incident->created_at->format('Y-m-d') }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
