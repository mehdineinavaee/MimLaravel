<div class="user-panel mt-3 pb-3 mb-3 d-flex" style="justify-content: space-between;">
    <div class="image">
        @foreach ($current_user as $user)
            @if (isset($user->cover))
                <img src="{{ asset('storage/users/' . $user->cover) }}" class="img-circle elevation-2"
                    alt="{{ $user->fullName }}" />
            @else
                <img id="img_prv" src="{{ asset('assets/img/no_image.png') }}" class="img-circle elevation-2"
                    alt="{{ $user->fullName }}">
            @endif
        @endforeach
    </div>

    <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->fullName }}</a>
    </div>
    <div class="info">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            خروج
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
