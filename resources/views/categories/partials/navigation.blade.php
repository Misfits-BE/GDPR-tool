<form method="GET" action="" class="mb-3 bow-shadow form-inline">
    <div class="input-group box-shadow" style="width: 100%">
        <input type="text" class="form-control" placeholder="Search a privacy category." @input('term') aria-label="Category search" aria-describedby="CategorySearch">
        <div class="input-group-append box-shadow">
            <button type="submit" class="btn btn-danger" id="CategorySearch">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>

<div class="list-group border-0 box-shadow">
    <a href="" class="list-group-item list-group-item-action active">
        <i class="fas fa-fw mr-1 fa-tag"></i> Categories overview
    </a>

    <a href="{{ route('categories.create') }}" class="list-group-item list-group-item-action">
        <i class="fas fa-plus fa-fw mr-1"></i> Create new category
    </a>
</div>