<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Create New Order') }}</h6>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="catalog_id" class="form-control-label">{{ __('Catalog ID') }}</label>
                                <div class="@error('catalog_id')border border-danger rounded-3 @enderror">
                                    <select wire:model="catalog_id" name="catalog_id" id="catalog_id"  class="form-control">
                                        <option value="">Select Catalog ... </option>
                                        <option value="1">Birthday Party </option>
                                        <option value="2">Bridal Shower </option>
                                        <option value="3">Baby Shower </option>
                                    </select>
                                </div>
                                @error('catalog_id') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        @if (!empty($categories))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="form-control-label">{{ __('Category Detail') }}</label>
                                    <div class="@error('category_id')border border-danger rounded-3 @enderror">
                                        <select wire:model="category_id" name="category_id" id="category_id"  class="form-control">
                                            <option value="">Select Catalog ... </option>
                                            @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}">{{ucfirst($cat->category_name)}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        @endif
                        
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">{{ __('Select User') }}</label>
                                <div class="@error('name')border border-danger rounded-3 @enderror">
                                    <select wire:model="name" name="name" id="name"  class="form-control">
                                        <option value="">Select User ... </option>
                                        @foreach ($users as $item)
                                            <option value="{{$item->id}}">{{ucfirst($item->name)}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname" class="form-control-label">{{ __('Firstname') }}</label>
                                <div class="@error('firstname')border border-danger rounded-3 @enderror">
                                    <input wire:model="firstname" class="form-control" type="text"
                                        placeholder="Input firstname" id="firstname">
                                </div>
                                @error('firstname') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname" class="form-control-label">{{ __('Lastname') }}</label>
                                <div class="@error('lastname')border border-danger rounded-3 @enderror">
                                    <input wire:model="lastname" class="form-control" type="text"
                                        placeholder="Input lastname" id="lastname">
                                </div>
                                @error('lastname') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">{{ __('Email') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input wire:model="email" class="form-control" type="text"
                                        placeholder="Input email" id="email">
                                </div>
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="form-control-label">{{ __('Phone Number') }}</label>
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <input wire:model="phone" class="form-control" type="number"
                                        placeholder="Input phone" id="phone">
                                </div>
                                @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city" class="form-control-label">{{ __('City') }}</label>
                                <div class="@error('city')border border-danger rounded-3 @enderror">
                                    <select wire:model="city" name="city" id="city"  class="form-control">
                                        <option value="">Select City ... </option>
                                        <option>Jakarta</option>
                                        <option>Bogor</option>
                                        <option>Depok</option>
                                        <option>Tangerang</option>
                                        <option>Bekasi</option>
                                    </select>
                                </div>
                                @error('city') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zipcode" class="form-control-label">{{ __('Zipcode') }}</label>
                                <div class="@error('zipcode')border border-danger rounded-3 @enderror">
                                    <input wire:model="zipcode" class="form-control" type="number"
                                        placeholder="Input zipcode" id="zipcode">
                                </div>
                                @error('zipcode') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">{{ 'Address' }}</label>
                                <div class="@error('address')border border-danger rounded-3 @enderror">
                                    <textarea wire:model="address" class="form-control" id="address" rows="3"
                                        placeholder="Input client address"></textarea>
                                </div>
                                @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="notes">{{ 'Notes' }}</label>
                                <div class="@error('notes')border border-danger rounded-3 @enderror">
                                    <textarea wire:model="notes" class="form-control" id="notes" rows="3"
                                        placeholder="Input client notes"></textarea>
                                </div>
                                @error('notes') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
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
