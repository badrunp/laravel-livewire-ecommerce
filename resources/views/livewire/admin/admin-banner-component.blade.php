<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12"
                            style="display: flex; align-items: center; justify-content: space-between">
                            <h4>All Banners</h4>
                            <div>
                                <a href="{{ route('admin.store.banner') }}" class="btn btn-primary btn-sm">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Price</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($banners as $key => $value)
                            <tr>
                                <td>{{ $banners->firstItem() + $key }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$value->image) }}" alt="" width="100">
                                </td>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->subtitle }}</td>
                                <td>{{ $value->price }}</td>
                                <td>{{ $value->link }}</td>
                                <td>
                                    @if($value->status == 'active')
                                        <button class="btn btn-danger" type="submit" wire:click.prevent="updateStatus({{$value->id}})">Un active</button>
                                    @else
                                        <button class="btn btn-success" type="submit" wire:click.prevent="updateStatus({{$value->id}})">Active</button>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="confirm('yes or not?') ? Livewire.emit('deleteBanner',{{ $value->id }}) : false">Delete</button>
                                    <a href="{{ route('admin.store.banner', $value) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    Banners is empty!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>