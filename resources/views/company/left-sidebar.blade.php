<div class="company-left-sidebar">

    <div class="header-sidebar">
        <h2>{{ Auth::user()->company_name }}</h2>
        <p>Liczba pakietów:
            @if(Auth::user()->package == null)
                0
                @else
                {{ Auth::user()->package }}
                @endif
        </p>
    </div>

    <div class="sidebar-hr"></div>

    <div class="links-container">
        <button class="left-sidebar-close" id="left-hamburger-close">
            <i class="sidebar icon"></i>
        </button>


        <a href="{{ route('company-show', Auth::id()) }}">
            <p>  <i class="user icon"></i> Dashboard</p>
        </a>
        <a href="{{ route('company-payment', Auth::id()) }}" class="premium-link">
            <p>  <i class="star icon"></i> Premium</p>
        </a>
        <a href="{{ route('company-form', Auth::id()) }}">
            <p>  <i class="paste icon"></i> Moje formularze</p>
        </a>
        <a href="{{ route('company-archives', Auth::id()) }}">
            <p>  <i class="archive icon"></i> Archiwum</p>
        </a>
        <a href="{{ route('company-settings', Auth::id()) }}">
            <p>  <i class="settings icon"></i> Ustawienia</p>
        </a>
        <a href="{{ route('company-inbox', Auth::id()) }}">
            <p>  <i class="question icon"></i> Support</p>
        </a>
    </div>

    <div class="sidebar-hr"></div>

    <div class="quest-panel-sidebar">
        <h2><p>Masz pytanie ?</p>
            <p>Z chęcią na nie odpowiemy.</p>
        </h2>
    </div>
    <div class="question-button">
        {{--<button >--}}
            <a href="{{ route('company-inbox', Auth::id()) }}"><button>?</button></a>
        {{--</button>--}}
    </div>
</div>


{{--

    <button class="left-sidebar" id="left-hamburger">
        <i class="sidebar icon"></i>
    </button>
--}}

