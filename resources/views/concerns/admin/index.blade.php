@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-md-5">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-secondary">All</button>
                    <button type="button" class="btn btn-secondary">Assigned</button>
                    <button type="button" class="btn btn-secondary">Created</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-secondary">New issue</button>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="float-right">
                <form method="GET" action="" class="col-md-7">
                                <div class="col-md-7">
                                        <input type="text" class="form-control" style="width: 100%;" placeholder="Search a domain." @input('term') aria-label="Domain search" aria-describedby="DomainSearch">
                                </div>
                                
                        </form>
            </div>
        </div>
    </div>
@endsection