<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Create Category') }}</h6>
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

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="catalog_id" class="form-control-label">{{ __('Catalog ID') }}</label>
                                <div class="@error('catalog_id')border border-danger rounded-3 @enderror">
                                    <select wire:model="catalog_id" name="catalog_id" id="catalog_id"  class="form-control">
                                        <option value="">Select Catalog ... </option>
                                        <option value="1">Bridal Shower </option>
                                        <option value="2">Birthday Party </option>
                                        <option value="3">Baby Shower </option>
                                    </select>
                                </div>
                                @error('catalog_id') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category-name" class="form-control-label">{{ __('Category Name') }}</label>
                                <div class="@error('category_name')border border-danger rounded-3 @enderror">
                                    <input wire:model="category_name" class="form-control" type="text" placeholder="Category Name"
                                        id="category-name">
                                </div>
                                @error('category_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_code" class="form-control-label">{{ __('Category Code') }}</label>
                                <div class="@error('category_code')border border-danger rounded-3 @enderror">
                                    <input wire:model="category_code" class="form-control" type="text" placeholder="Category Code"
                                        id="category_code">
                                </div>
                                @error('category_code') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_type" class="form-control-label">{{ __('Category Type') }}</label>
                                <div class="@error('category_type')border border-danger rounded-3 @enderror">
                                    <select wire:model="category_type" name="category_type" id="category_type"  class="form-control">
                                        <option value="">Select Category Type ... </option>
                                        <option value="1">Table Decoration </option>
                                        <option value="2">Room Decoration </option>
                                    </select>
                                </div>
                                @error('category_type') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="form-control-label">{{ __('Price') }}</label>
                                <div class="@error('price')border border-danger rounded-3 @enderror">
                                    <input wire:model="price" class="form-control" type="number"
                                        placeholder="Input price" id="price">
                                </div>
                                @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount" class="form-control-label">{{ __('discount') }}</label>
                                <div class="@error('discount')border border-danger rounded-3 @enderror">
                                    <input wire:model="discount" class="form-control" type="number"
                                        placeholder="40770888444" id="discount" max="100">
                                </div>
                                @error('discount') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="filename" class="form-control-label">{{ __('Upload File') }}</label>
                                <div class="@error('filename') border border-danger rounded-3 @enderror">
                                    <input wire:model="filename" class="form-control" type="file" name="filename"
                                        placeholder="Location" id="name">
                                </div>
                                @error('filename') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">{{ 'Description' }}</label>
                        <div class="@error('description')border border-danger rounded-3 @enderror">
                            <textarea wire:model="description" class="form-control" id="description" rows="3"
                                placeholder="Say something about this item"></textarea>
                        </div>
                        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button style="left: 18%;position: relative;" type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
