<x-guest-layout>

    <div class="py-10">
        <h1 class="text-center text-purple-800 text-3xl font-bold">Category</h1>
        <hr>


    <section class="bg-gray-100 p-5 dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center">
        <div class="bg-white dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
            <div class="lg:w-1/2">
                <table class="border ">
                    <tr class="border-sm">
                        <td>Parent</td>
                        <td>Name</td>
                        <td>Actions</td>
                    </tr>

                    @foreach ($categories->load('parent') as $category)
                    <tr class="p-3">
                        <td class="m-2 p-2">{{ $category->parent->name ?? 'Root' }}</td>
                        <td class="m-2 p-2">{{ $category->name }}</td>
                        <td class="m-2 p-2"><button>Edit</button></td>
                    </tr>
                    @endforeach
                </table>

            </div>

            <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
                <form action="{{ route('category') }}" method="POST">
                    @csrf
                    <select name="parent_id" id="">
                        <option value="">Parent </option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }} </option>
                        @endforeach
                    </select>
                    <br><br>
                    <input type="text" name="name">
                    <br><br>
                    <button class="bg-red-500 p-2 rounded">Submit</button>
                </form>

            </div>
        </div>
    </section>
    </div>

   <hr class="border ">
   <ul>
    @foreach ($parent_category as $pc)
    <li> {{ $pc->name }}</li>

    {{-- @include('category.subcategory',['subcategories' => $pc->children]) --}}
    @endforeach

   </ul>

</x-guest-layout>
