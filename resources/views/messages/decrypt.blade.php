@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Decrypt Message') }}</div>

                    @if(session()->has('status'))
                        <div class="container mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Error!</strong> {{ session('status') }}
                            </div>
                        </div>
                    @endif


                    <div class="card-body">
                        <form method="POST" action="{{ route('decrypt.message.submit') }}">
                            @csrf

                            <div class="form-group">
                                <label for="username">Your Username (Identifier)</label>
                                <input id="username" type="text" class="form-control" name="username" required autofocus>
                            </div>

                            <div class="form-group mt-2">
                                <label for="decryption_key">Decryption Key</label>
                                <input id="decryption_key" type="password" class="form-control" name="decryption_key" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">
                                {{ __('Decrypt') }}
                            </button>
                        </form>
                    </div>
                    @if(session()->has('decryptedMessage'))
                        <div>
                            {{ session('decryptedMessage') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
