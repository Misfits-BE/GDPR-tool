@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-4">
            <div class="list-group border-0 box-shadow">
                <a href="#" class="list-group-item list-group-item-action disabled">
                    <i class="fas fa-fw mr-1 fa-bars"></i> Account configuration
                </a>

                <a href="#" class="list-group-item list-group-item-action active">
                    <i class="fas fa-info-circle fa-fw mr-1"></i> Account information
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-key fa-fw mr-1"></i> Account security
                </a>
            </div>

            <div class="list-group border-0 box-shadow my-3">
                <a href="#" class="list-group-item list-group-item-danger list-group-item-action">
                    <i class="far fa-trash-alt fa-fw mr-1"></i> Delete your account
                </a>
            </div>
        </div>

        <div class="col-8">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <h6 class="border-bottom border-gray pb-2 mb-3">Account information</h6>

                    <form action="">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-3 col-form-label">Email <span class="input-required">*</span></label>
                            <div class="col-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection