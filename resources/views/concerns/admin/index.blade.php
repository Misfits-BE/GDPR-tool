@extends('layouts.app')

@section('content')
    <div class="row my-3">

        <div class="col-md-12">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group box-shadow mr-2" role="group" aria-label="First group">
                    <a href="{{ route('concern.index') }}" class="btn btn-primary">
                        Open <span class="ml-1 badge badge-light">9</span>
                    </a>
                    <a href="" class="btn btn-primary">
                        Assigned <span class="ml-1 badge badge-light">9</span>
                    </a>
                    <a href="" class="btn btn-primary">
                        Created <span class="ml-1 badge badge-light">9</span>
                    </a>
                </div>
                <div class="btn-group box-shadow" role="group" aria-label="Third group">
                    <a href="{{ route('concern.create') }}" class="btn btn-secondary"><i class="fas fa-fw mr-1 fa-plus-circle"></i> New concern</a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Recent privacy concerns</h6>
                <div class="media text-muted pt-3">
                    <div style="font-size:1.75em; text-align: center; width: 35px; height:35px;" class="mr-2 rounded">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark">Full Name</strong>
                            <a href="#"><i class="far fa-eye"></i> View</a>
                        </div>
                        <span class="mt-1 d-block">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</span>
                    </div>
                </div>

                <small class="d-block text-right mt-3">
                    <a href="">Previous</a> -
                    <a href="">Next</a>
                </small>
       
            </div>
        </div>
    </div>
@endsection