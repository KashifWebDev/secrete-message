<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Messages</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="https://i.ibb.co/Kb1Vzx3/png-transparent-lock-system-self-storage-encryption-information-open-account-online-miscellaneous-co.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Secure Messages
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.create') }}">Create Message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('decrypt.message') }}">{{ __('Decrypt Message') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-4">
    @yield('content')
</div>

<!-- Bootstrap JS Bundle (Bootstrap + Popper) CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
