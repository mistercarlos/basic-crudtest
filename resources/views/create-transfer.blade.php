@extends('layouts.app')

@section('content')
    <div class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

                <div class="container-fluid">
                    <div class="row">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3>Create Transfer</h3>
                            </div>
                            <form method="POST" action="{{ route('store.transfer') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="floatingSelect">Select Products: </label><br>
                                        <select class="products w-100" name="products[]" multiple="multiple" id="floatingSelect">
                                            @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.products').select2();
        });
    </script>
@endsection
