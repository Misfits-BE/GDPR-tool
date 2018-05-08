<div class="list-group border-0 box-shadow">
    <a href="#" class="list-group-item list-group-item-action disabled">
        <i class="fas fa-fw mr-1 fa-bars"></i> Account configuration
    </a>

    <a href="{{ route('profile.settings') }}" class="list-group-item list-group-item-action active">
        <i class="fas fa-info-circle fa-fw mr-1"></i> Account information
    </a>

    <a href="{{ route('profile.settings.security') }}" class="list-group-item list-group-item-action">
        <i class="fas fa-key fa-fw mr-1"></i> Account security
    </a>
</div>

<div class="list-group border-0 box-shadow my-3">
    <a href="#" class="list-group-item list-group-item-danger list-group-item-action">
        <i class="far fa-trash-alt fa-fw mr-1"></i> Delete your account
    </a>
</div>