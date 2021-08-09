<div class="container">
    <h1 class="text-center">{{ $title }}</h1>

    <ul>
        @foreach ($users as $user)
        <li>
            <h5>Name : {{ $user->name }}</h5>
            <p>Email : {{ $user->email }}</p>
        </li>
        @endforeach
    </ul>
</div>
