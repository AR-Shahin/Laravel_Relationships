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
                    You're logged in! <a href="@route('poly')">Poly</a>
                   <div class="row ">
                       <div class="col-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</td>
                            </tr>
                            @foreach ($users as $user)
                             {{-- @php
                                 dd($user->role())
                             @endphp --}}
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td><span class="font-bold {{ $user->role()->textClass() }}" >{{ $user->email}}</span></td>
                                <td>
                                    {{-- <span class="p-1 rounded text-white {{ $user->className() }}">{{ $user->role }}</span> --}}
                                    <span class="p-1 rounded text-white {{ $user->role()->backgroundClass() }}">{{ $user->role }}</span>
                                </td>
                                <td>Actions</td>
                            </tr>
                            @endforeach
                        </table>
                        {{ $users->links() }}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
