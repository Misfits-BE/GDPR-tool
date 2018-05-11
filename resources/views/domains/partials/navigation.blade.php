<form method="GET" action="{{ route('domains.index') }}" class="mb-3 box-shadow form-inline">
    <div class="input-group box-shadow" style="width: 100%">
        <input type="text" class="form-control" placeholder="Search a domain." @input('term', $term) aria-label="Domain search" aria-describedby="DomainSearch">
        <div class="input-group-append box-shadow">
            <button type="submit" class="btn btn-danger" id="DomainSearch">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>

<div class="list-group border-0 box-shadow">
    <a href="{{ route('domains.index') }}" class="list-group-item list-group-item-action active">
        <i class="fas fa-link fa-fw mr-1"></i> Domains overview
    </a>

    <a href="{{ route('domains.create') }}" class="list-group-item list-group-item-action">
        <i class="fas fa-plus fa-fw mr-1"></i> Create new domain
    </a>
</div>