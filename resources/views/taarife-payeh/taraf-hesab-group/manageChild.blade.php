<ul>
    @foreach ($childs as $child)
        <li>
            {{ $child->title }}

            @if (count($child->childs))
                @include('taarife-payeh.taraf-hesab-group.manageChild', ['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
