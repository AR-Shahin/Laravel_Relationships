<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    @endpush
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl">Posts</h1>
                    <a href="{{ route('fuck') }}">Fuck</a>
                    @can('isAdmin')
                    <a href="{{ route('post.create') }}">Create</a>
                    @endcan
                    @can('isUser')
                        <h1>User Can Access</h1>
                    @endcan

                    @can('isAdmin')
                        <h1>Admin Can Access</h1>
                    @endcan
                                        <table class="table-auto"">
                        <tr>
                            <th class="mx-2">Name</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($posts as $post)

                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                <a href="{{ route('post.show',$post->id) }}">Show</a>


                                @can('destroy' , $post)
                                <form action="@route('post.destroy',['post' => $post->id])" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                                @endcan
                                @can('update-post',new App\Models\Post)
                                <a href="" class="btn btn-success btn-sm">Update</a>
                                @endcan


                            </td>
                        </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
