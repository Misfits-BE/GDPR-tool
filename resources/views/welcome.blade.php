@extends('layouts.front')

@section('content')
<div class="jumbotron">
        <div class="container">
          <h1 class="display-3">{{ config('app.name') }} - GDPR</h1>
          <p>
              Excercise your rights under the GDPR law, with this service you can send your privacy concerns to us.<br>
              All submissions wil be send to the Data Protection Officer from the given platform that u can define in the form.
          </p>
          
          <hr class="my-3"> 
            
            <p class="lead">
                <a href="" role="button" class="btn btn-outline-primary btn-lg">
                    <i class="fa fa-info-circle"></i> Onze visie
                </a> 
                
                <a href="" role="button" class="btn btn-outline-primary btn-lg">
                    <i class="fa fa-heart text-danger"></i> Ondersteun ons
                </a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row my-3">
            <div class="col-12">
                <div class="card card-body border-0 box-shadow">
                    <div class="row">
                        <div style="border-right: 1px solid rgba(0, 0, 0, 0.1);" class="col-8">
                            <h3 class="border-bottom border-gray pb-2 mr-0 pr-0 mb-3">Send your privacy concern to our DPO(s).</h3>

                            <form action="" class="mt-3 pt-3">
                                @csrf {{-- Form field protection --}}

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Example label <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control col-md-7" id="formGroupExampleInput" placeholder="Example input">
                                </div>
                            </form>
                        </div>
            
                        <div class="col-4">
                            <div class="alert alert-info" role="alert">
                                <h6><strong><i class="fas fa-fw mr-1 fa-info-circle"></i> Account creation info</strong></h6>

                                <p>
                                    Based on the given email address there would be created a new login for the platform. 
                                    If the email-address is not found in our GDPR tool.
                                </p>

                                <p>
                                    With your account or created account. Your can track the replies and progress on your privacy concern(s).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection