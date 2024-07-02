@extends('layouts.app')

@section('content')
    <div class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="justify-content-between">
                    @if(Auth::user()->role == "Admin")
                    <a role="button" href="{{ route('approve.transfer', $transfer->id) }}" class="btn btn-outline-success pull-right">Approve</a>
                    <a role="button" href="{{ route('download', $transfer->id) }}" class="btn btn-outline-primary">Print</a>
                    @endif
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">UserName</th>
                            <th scope="col">Description</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Requestor</th>
                            <th scope="col">Requesting</th>
                            <th scope="col">Status Approval</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transfer->products as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $transfer->requestor->name }}</td>
                            <td>{{ $item->desc }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $transfer->requestor->name }}</td>
                            <td class="{{ $transfer->status == 'Done' ? 'bg-success' : 'bg-warning' }}">{{ $transfer->status }}</td>
                            <td class="{{ $transfer->status == 'Done' ? 'bg-success' : 'bg-secondary' }}">{{ $transfer->status != "Done" ? "Waiting approval" : "Approved" }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
