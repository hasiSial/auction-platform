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
                    <div class="col-md-12">
                        <div class="mb-3 text-end">
                            <a href="{{ route('create.bid') }}" class="btn btn-primary">Add new bid</a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Auction Bid</h4>
                                
                            </div>
                            @if(count($data) > 0)
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Item Name</th>
                                                    <th class="text-center">Bid Amount</th>
                                                    <th class="text-center">Bidder Name</th>
                                                    {{-- <th class="text-end">Auction</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value->item->name }}</td>
                                                        <td class="text-center">{{ $value->bid_amount }}</td>
                                                        <td class="text-center">{{ $value->user->name }}</td>
                                                        {{-- <td class="text-center" style="vertical-align: top;">
                                                            <div class="d-flex justify-content-end">
                                                                <a href="{{route('edit.item',$value->id)}}" class="btn btn-info me-3">
                                                                    Edit
                                                                </a>
                                                                <form id="delete-form-{{$value->id}}"
                                                                      action="{{route('destory.item',$value->id)}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-warning"
                                                                    onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                                                </form>
                                                            </div>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="card-body">
                                    <div class="alert alert-primary" role="alert">
                                        Oops! No record found
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection
