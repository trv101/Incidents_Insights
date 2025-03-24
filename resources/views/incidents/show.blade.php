@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white shadow rounded mt-8">
        <h1 class="text-2xl font-bold mb-4">Incident Info</h1>
        <a href="{{ route('incidents.index') }}" 
        class="inline-block px-4 py-2 bg-cyan-400 text-white rounded-md shadow hover:bg-cyan-500 transition mb-4">
        Back</a>
        
        <div class="space-y-4">
        <p><strong>Description:</strong> {{ $incident->description }}</p>
        <p><strong>Incident Type:</strong> {{ $incident->incident_type }}</p>
        <p><strong>Category:</strong> {{ $incident->category }}</p>
        <p><strong>Impact:</strong> {{ $incident->impact }}</p>
        <p><strong>Urgency:</strong> {{ $incident->urgency }}</p>
        <p><strong>Status:</strong> {{ $incident->status }}</p>
        <p><strong>Priority:</strong> {{ $incident->priority }}</p>
        <p><strong>Assigned Department:</strong> {{ $incident->assigned_department }}</p>
        <p><strong>Created By:</strong> {{ $incident->user->name }} ({{ $incident->user->email }})</p>
        <p><strong>Corrective Action:</strong> {{ $incident->corrective_action ?? 'No corrective action yet.' }}</p>
        <p><strong>Created At:</strong> {{ $incident->created_at->format('Y-m-d H:i:s') }}</p>
        <p><strong>Updated At:</strong> {{ $incident->updated_at->format('Y-m-d H:i:s') }}</p>
        <p><strong>Updated By:</strong> {{ $incident->updatedByUser->name ?? 'Not updated yet' }}</p>
        </div>
        
    </div>
@endsection
