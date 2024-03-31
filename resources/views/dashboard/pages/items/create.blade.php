@extends('dashboard.layout.main')
@section('main.content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header text-center">{{ __('Add Auction Items') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('store.item')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="col mb-12">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col mb-12">
                                    <label for="starting_price" class="col-form-label text-md-end">{{ __('Starting Price') }}</label>

                                    <div class="col-md-12">
                                        <input type="number" class="form-control @error('starting_price') is-invalid @enderror" name="starting_price" value="{{ old('starting_price') }}" required autocomplete="starting_price">

                                        @error('starting_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col mb-12">
                                    <label for="auction_end_time" class="col-form-label text-md-end">{{ __('Auction End Time') }}</label>

                                    <div class="col-md-12">
                                        <input type="datetime-local" class="form-control @error('auction_end_time') is-invalid @enderror" name="auction_end_time" value="{{ old('auction_end_time') }}" required autocomplete="auction_end_time">

                                        @error('auction_end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col mb-12">
                                    <label for="description" class="col-form-label text-md-end">{{ __('Description') }}</label>

                                    <div class="col-md-12">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>

                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0" >
                                    <div class="col-md-6 offset-md-5 mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row mb-0">
    <div class="col-md-6 offset-md-5 mt-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
    </div>
</div> --}}

@endsection
