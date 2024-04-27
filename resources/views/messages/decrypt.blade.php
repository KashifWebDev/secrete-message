@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Decrypt Message') }}</div>

                    @if(session()->has('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="card-body">
                        <form method="POST" action="{{ route('decrypt.message.submit') }}">
                            @csrf

                            <div class="form-group">
                                <label for="username">Your Username (Identifier)</label>
                                <input id="username" type="text" class="form-control" name="username" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="decryption_key">Decryption Key</label>
                                <input id="decryption_key" type="password" class="form-control" name="decryption_key" required>
                            </div>

                            <button type="submit" class="btn btn-primary">
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
