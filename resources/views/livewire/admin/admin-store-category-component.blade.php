<div class="container" style="padding: 30px 0;">
    <div class="row" style="display: flex; justify-content: center">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{$type}} Category</h4>
                </div>
                <div class="panel-body" style="padding: 20px 40px">
                    <form action="" class="form-horizontal" wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control input-md" wire:model="name">
                            @error('name')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Slug</label>
                            <input type="text" class="form-control input-md" wire:model="slug" disabled readonly>
                            @error('slug')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{$type}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
