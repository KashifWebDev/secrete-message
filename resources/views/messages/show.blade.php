@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="card-title">Decrypted Message</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $decryptedMessage }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
