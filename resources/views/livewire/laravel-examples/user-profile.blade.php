<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Profile Information') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                @if ($showSuccesNotification)
                    <div wire:model="showSuccesNotification"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ __('Your profile information have been successfuly saved!') }}</span>
                        <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-firstname" class="form-control-label">{{ __('First Name') }}</label>
                                <div class="@error('firstname')border border-danger rounded-3 @enderror">
                                    <input wire:model="firstname" class="form-control" type="text" placeholder="First Name"
                                        id="user-firstname">
                                </div>
                                @error('firstname') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-lastname" class="form-control-label">{{ __('Last Name') }}</label>
                                <div class="@error('lastname')border border-danger rounded-3 @enderror">
                                    <input wire:model="lastname" class="form-control" type="text" placeholder="Last Name"
                                        id="user-lastname">
                                </div>
                                @error('lastname') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role" class="form-control-label">{{ __('Role') }}</label>
                                <div class="@error('role')border border-danger rounded-3 @enderror">
                                    <select wire:model="role" name="role" id="role"  class="form-control">
                                        <option value="">Select Role ... </option>
                                        <option value="admin">Admin </option>
                                        <option value="member">Member </option>
                                    </select>
                                </div>
                                @error('role') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input wire:model="email" class="form-control" type="email"
                                        placeholder="@example.com" id="user-email">
                                </div>
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-password" class="form-control-label">{{ __('Password') }}</label>
                                <div class="@error('password')border border-danger rounded-3 @enderror">
                                    <input wire:model="password" class="form-control" type="password"
                                        placeholder="@example.com" id="user-password">
                                </div>
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="form-control-label">{{ __('Phone') }}</label>
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <input wire:model="phone" class="form-control" type="tel"
                                        placeholder="40770888444" id="phone">
                                </div>
                                @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location" class="form-control-label">{{ __('Location') }}</label>
                                <div class="@error('location') border border-danger rounded-3 @enderror">
                                    <input wire:model="location" class="form-control" type="text"
                                        placeholder="Location" id="name">
                                </div>
                                @error('location') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about">{{ 'About Me' }}</label>
                        <div class="@error('about')border border-danger rounded-3 @enderror">
                            <textarea wire:model="about" class="form-control" id="about" rows="3"
                                placeholder="Say something about yourself"></textarea>
                        </div>
                        @error('about') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
