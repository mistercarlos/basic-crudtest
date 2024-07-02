@extends('layouts.app')

@section('content')
    <div class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="pull-right">
                    <a role="button" href="{{ route('create.transfer') }}" class="btn btn-outline-primary pull-right">Create Transfer</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Status</th>
                            <th scope="col">Requestor</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transfers as $transfer)
                        <tr>
                            <th scope="row">{{ $transfer->id }}</th>
                            <td>{{ $transfer->status }}</td>
                            <td>{{ $transfer->requestor->name }}</td>
                            <td>
                                <div class="justify-content-between">
                                    <a role="button" class="btn btn-info" href="{{ route('detail.transfer', $transfer->id) }}">Show</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection