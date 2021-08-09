<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Component</title>
</head>
<body>
  {{-- <x-my-custom-user/> --}} <!-- use by service provider -->
    <x-user.user-component title="Users Data" :users="$users"/>
<hr>
{{--
    <x-alert.alert type="warning" message="This is warning Type"/> --}}
    <x-alert.alert type="success" message="This is success Type"/>

    <!-- Slot -->

    {{-- <x-alert.notification :users="$users" >
        Notification Slot
        <x-slot name="left">
            <h3 class="text-center">Left Content</h3>
            <x-user.user-component title="Users Data" :users="$users"/>
        </x-slot>

        <x-slot name="right">
            <h3 class="text-center">Right Content</h3>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, consectetur!
        </x-slot>
    </x-alert.notification> --}}
</body>
</html>
