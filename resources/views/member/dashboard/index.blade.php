Dashboard

<form method="POST" action="{{ route('member.logout') }}">
    @csrf
    <a href="{{ route('member.logout') }}" class="dropdown-item has-icon text-danger"
        onclick="event.preventDefault();
    this.closest('form').submit();">
        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
    </a>
</form>
