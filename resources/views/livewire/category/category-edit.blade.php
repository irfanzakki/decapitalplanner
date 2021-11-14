<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Edit Category') }}</h6>
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

                <form wire:submit.prevent="update" action="#" method="POST" role="form text-left">
                    <input type="hidden" wire:model="postId">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Category Name') }}</label>
                                <div class="@error('catalog_name')border border-danger rounded-3 @enderror">
                                    <input wire:model="catalog_name" class="form-control" type="text" placeholder="Name"
                                        id="category-name">
                                </div>
                                @error('catalog_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    <div class="d-flex justify-content-center">
                        <button style="left: 18%;position: relative;" type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
