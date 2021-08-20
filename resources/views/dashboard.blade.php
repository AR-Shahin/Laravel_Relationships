<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! shahin
                   <div class="row ">
                       <div class="col-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Actions</td>
                            </tr>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                <td>Actions</td>
                            </tr>
                            @endforeach
                        </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
