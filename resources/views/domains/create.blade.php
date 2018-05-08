@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-3">
            @include ('domains.partials.navigation')
        </div>

        <div class="col-9">
            <div class="card card-body border-0 box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-3">Add new domain</h6>

                <form method="POST" action="">
                    @csrf {{-- Form field protection --}}

                    <div class="form-group row">
                        <label for="name" class="col-3 col-form-label">Platform name: <span class="input-required">*</span></label>

                        <div class="col-9">
                            <input type="text" placeholder="Platform name" class="form-control @error('name', 'is-invalid')" @input('name') id="name">
                            @error('name', '<div class="invalid-feedback">:message</div>')
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-3 col-form-label">Platform domain <span class="input-required">*</span></label>

                        <div class="col-9">
                            <input type="url" aria-describedby="domainHelpBlock" placeholder="Platform domain" class="form-control @error('url', 'is-invalid')" @input('url') id="url">

                            @if ($errors->has('url')) {{-- There are validation errors found --}}
                                @error('url', '<div class="invalid-feedback">:message</div>')
                            @else {{-- No validation errors found --}}
                                <small id="domainHelpBlock" class="form-text text-muted">
                                    <span class="input-required">*</span> Prefix the domain with <strong>http://</strong> or <strong>https://</strong>
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dpo" class="col-3 col-form-label">Data Protection Officer <span class="input-required">*</span></label>

                        <div class="col-9">
                            <select @input('pdo_id') id="pdo" class="form-control @error('dpo', 'is-invalid')">
                                <option value="">-- Select platform DPO --</option>

                                @foreach ($dpos as $dpo) {{-- DPO loop --}}
                                    <option value="{{ $dpo->id }}" @if (old('pdo_id') == $dpo->id) selected @endif>
                                        {{ $dpo->name }} ({{ $dpo->email }})
                                    </option>
                                @endforeach {{-- /// END loop --}}
                            </select>

                            {{-- Validation error view partial --}}
                            @error('pdo_id', '<div class="invalid-feedback">:message</div>')
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-9">
                            <button type="submit" class="btn btn-outline-success"><i class="fas fa-fw fa-check"></i> Create</button>
                            <button type="reset" class="btn btn-outline-danger"><i class="fas fa-fw fa-undo"></i> Reset</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection