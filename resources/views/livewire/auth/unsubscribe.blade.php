<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="row w-100 justify-content-center mb-4">
                        <div class="col-auto">
                            <img src="{{ asset('home/img/logo_vtapp.png') }}" alt="Logo" style="max-height: 70px;">
                        </div>
                    </div>
                    <h2 class="mb-3 text-primary">{{ __('Unsubscribe from Emails') }}</h2>
                    <p class="mb-4 text-muted">
                        We're sorry to see you go. If you unsubscribe, you will no longer receive important
                        updates and notifications from us.
                    </p>
                    <form wire:submit="unsubscribe">
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" wire:model="email"
                                placeholder="Enter your email">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-danger w-100 mb-3">
                            Unsubscribe Me
                        </button>
                    </form>
                    <hr class="my-4">
                    <small class="text-secondary">
                        If you didn't request this, you can safely ignore this email.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>