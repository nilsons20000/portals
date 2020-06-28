@foreach ($categories as $category)
  @if ($category->children->where('published', 1)->count())
    <li>
      <a href="{{url("/blog/category/$category->slug")}}" >
        {{$category->title}} <span class="caret"></span>
      </a>
      <ul>
        @include('layouts.top_menu', ['categories' => $category->children])
      </ul>
  @else
    <li>
      <a href="{{url("/blog/category/$category->slug")}}">{{$category->title}}</a>
  @endif
    </li>
@endforeach




