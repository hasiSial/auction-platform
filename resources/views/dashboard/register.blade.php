<link rel="stylesheet" href="{{asset('dashboard/css/vertical-layout-light/bootstrap.css')}}">

<div class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" id="loginCard">
                <div class="card" style="margin:50px 100px;">
                    <div class="card-header text-center">{{ __('Register') }}</div>
                    <div class="card-body ms-4 me-4">
                        <form method="POST" action="{{ route('create.user') }}" enctype="multipart/form-data">
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
                                <label for="email" class="col-form-label text-md-end">{{ __('Email') }}</label>
                        
                                <div class="col-md-12">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col mb-12">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                        
                                <div class="col-md-12">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        
                                    @error('password')
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
