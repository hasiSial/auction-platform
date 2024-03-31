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
                        <div class="card-header text-center">{{ __('Add Auction Bid') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('store.bid')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="col mb-12">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Select Item') }}</label>
                                    <div class="col-md-12">
                                        <select class="form-select" name="item_id" id="item_id" aria-label="Default select example">
                                            <option disabled selected>Select item</option>
                                            @foreach ($items as $item)
                                                <option value="{{$item->id}}" data-current-bid="{{$item->current_bid}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('item_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col mb-12">
                                    <label for="starting_price" class="col-form-label text-md-end">{{ __('Current Bid') }}</label>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control @error('current_bid') is-invalid @enderror" name="current_bid" id="current_bid" value="{{ old('current_bid') }}" required autocomplete="current_bid">
                                        @error('current_bid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col mb-12">
                                    <label for="auction_end_time" class="col-form-label text-md-end">{{ __('Bid Amount') }}</label>

                                    <div class="col-md-12">
                                        <input type="number" class="form-control @error('bid_amount') is-invalid @enderror" name="bid_amount" value="{{ old('bid_amount') }}" required autocomplete="bid_amount">

                                        @error('bid_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0" >
                                    <div class="col-md-6 offset-md-5 mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Store') }}
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


<script>
    document.getElementById('item_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var currentBid = selectedOption.getAttribute('data-current-bid');
        currentBid = currentBid ? currentBid : 0;
        document.getElementById('current_bid').value = currentBid;
    });
</script>


@endsection


