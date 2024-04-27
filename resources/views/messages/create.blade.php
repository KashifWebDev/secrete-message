@extends('layouts.app')

@section('content')
    @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> {{ session('status') }}
        </div>
    @endif
    <h3>Store Message</h3>

    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="comment">Message:</label>
            <textarea class="form-control" rows="5" id="comment" name="text" required></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="recipient">Recipient Username:</label>
            <input type="text" class="form-control" id="recipient" placeholder="Recipient username" name="recipient" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="key">Decrypt Key:</label>
            <input type="text" class="form-control" id="key" placeholder="Secret Key" name="key" value="<?=md5(uniqid())?>" required>
        </div>
        <div class="mb-3 mt-3">
            <label>Expiry:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="expiry_option" id="deleteAfterView" value="delete_after_view" required>
                <label class="form-check-label" for="deleteAfterView">Delete after viewing the message</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="expiry_option" id="deleteOnDate" value="delete_on_date">
                <label class="form-check-label" for="deleteOnDate">Delete on selected date</label>
            </div>
        </div>
        <div class="mb-3 mt-3" id="expiryDateWrapper" style="display: none;">
            <label for="expiry">Expiry Date:</label>
            <input type="datetime-local" class="form-control" id="expiry" name="expiry">
        </div>
        <button type="submit" class="btn btn-primary">Create Message</button>
    </form>

    <script>
        // Function to show/hide the expiry date input based on radio button selection
        function toggleExpiryDateInput() {
            var expiryOption = document.querySelector('input[name="expiry_option"]:checked').value;
            var expiryDateWrapper = document.getElementById('expiryDateWrapper');

            if (expiryOption === 'delete_on_date') {
                expiryDateWrapper.style.display = 'block';
            } else {
                expiryDateWrapper.style.display = 'none';
            }
        }

        // Add event listeners to radio buttons to trigger the function
        var expiryOptions = document.querySelectorAll('input[name="expiry_option"]');
        expiryOptions.forEach(function(option) {
            option.addEventListener('change', toggleExpiryDateInput);
        });

        // Call the function initially to set the initial state
        toggleExpiryDateInput();
    </script>
@endsection
