@foreach($subcategories as $subcategory)
 <ul>
    <li>{{$subcategory->name}}</li>
  @if(count($subcategory->children))
  @include('category.subcategory',['subcategories' => $pc->children])

  @endif
 </ul>
@endforeach
