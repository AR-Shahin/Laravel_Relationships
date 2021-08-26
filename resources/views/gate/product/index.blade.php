<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    @endpush
    <hr>
    @can('create' , App\Models\Product::class)
    <a href="{{ route('product.create') }}" class="btn btn-success">Add</a>
    @endcan

    <div class="row container justify-content-center">
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th class="mx-2">Name</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>

                @foreach ($products as $product)
                <tr>
                    <td class="mx-2">{{ $loop->index + 1 }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->user->name }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-info">Update</a>

                        @can('delete', $product)
                        <form class="btn btn-sm btn-danger d-inline" action="@route('product.destroy',['product' => $product->id])" method="Post">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                        @endcan


                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</x-app-layout>
