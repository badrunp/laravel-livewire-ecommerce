<div class="container" style="padding: 30px 0;">
    <div class="row" style="display: flex; justify-content: center">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{$type}} Banner</h4>
                </div>
                <div class="panel-body" style="padding: 20px 40px">
                    <form action="" class="form-horizontal" wire:submit.prevent="store" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control input-md" wire:model="title">
                            @error('title')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="control-label">Subtitle</label>
                            <input type="text" class="form-control input-md" wire:model="subtitle" >
                            @error('subtitle')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label">Price</label>
                            <input type="text" class="form-control input-md" wire:model="price" >
                            @error('price')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link" class="control-label">Link</label>
                            <input type="text" class="form-control input-md" wire:model="link" >
                            @error('link')
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
