<div class="container" style="padding: 30px 0;">
    <div class="row" style="display: flex; justify-content: center">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{$type}} Product</h4>
                </div>
                <div class="panel-body" style="padding: 20px 40px">
                    <form action="" class="form-horizontal" wire:submit.prevent="store" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control input-md" wire:model="name">
                            @error('name')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug" class="control-label">Slug</label>
                            <input type="text" class="form-control input-md" wire:model="slug" disabled readonly>
                            @error('slug')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug" class="control-label">Slug</label>
                            <select class="form-control input-md" wire:model="category_id">
                                <option value="">Select Category</option>    
                                @foreach($categories as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>    
                                @endforeach
                            <select>
                            @error('category_id')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label">Price</label>
                            <input type="text" class="form-control input-md" wire:model="regular_price">
                            @error('regular_price')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sale_price" class="control-label">Sale Price</label>
                            <input type="text" class="form-control input-md" wire:model="sale_price">
                            @error('sale_price')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="short_description" class="control-label">Short Description</label>
                            <textarea class="form-control input-md" wire:model="short_description"></textarea>
                            @error('short_description')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control input-md" wire:model="description"></textarea>
                            @error('description')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="control-label">Quantity</label>
                            <input type="text" class="form-control input-md" wire:model="quantity">
                            @error('quantity')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock_status" class="control-label">Stock Status</label>
                            <select class="form-control input-md" wire:model="stock_status">
                                <option value="instock">Instock</option>    
                                <option value="outofstock">Out of Stock</option>    
                            <select>
                            @error('stock_status')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="featured" class="control-label">Is Featured</label>
                            <select class="form-control input-md" wire:model="featured">
                                <option value="0">Yes</option>    
                                <option value="1">No</option>    
                            <select>
                            @error('featured')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="SKU" class="control-label">SKU</label>
                            <input type="text" class="form-control input-md" wire:model="SKU">
                            @error('SKU')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        @if($type == 'Updated')
                        <div class="form-group">
                            <label for="newImage" class="control-label">Image</label>
                            <input type="file" class="form-control input-md" wire:model="newImage">
                            @error('newImage')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        @else
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control input-md" wire:model="image">
                            @error('image')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{$type}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
