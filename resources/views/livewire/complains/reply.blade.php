<main>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Reply Email') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                @if (session()->has('message'))
                    <div wire:model="showSuccesNotification"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ session('message') }}</span>
                        <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                <form wire:submit.prevent="sendEmail" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">{{ __('Send Email To') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input wire:model="email" class="form-control" type="text" placeholder="Category Name"
                                        id="category-name">
                                </div>
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="form-control-label">{{ __('Subject Title') }}</label>
                                <div class="@error('title')border border-danger rounded-3 @enderror">
                                    <input wire:model="title" class="form-control" type="text" placeholder="Category Name"
                                        id="category-name">
                                </div>
                                @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="description">{{ 'Description' }}</label>
                            <div class="@error('description')border border-danger rounded-3 @enderror">
                                <textarea wire:model="description" class="form-control" id="description" rows="3"
                                    placeholder="Say something about this item"></textarea>
                            </div>
                            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button style="left: 18%;position: relative;" type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Send Email' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>
