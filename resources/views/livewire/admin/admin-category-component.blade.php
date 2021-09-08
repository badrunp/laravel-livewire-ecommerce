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
                            <h4>All Categories</h4>
                            <div>
                                <a href="{{ route('admin.store.category') }}" class="btn btn-primary btn-sm">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $value)
                            <tr>
                                <td>{{ $categories->firstItem() + $key }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->slug }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="confirm('yes or not?') ? Livewire.emit('deleteCategory',{{ $value->id }}) : false">Delete</button>
                                    <a href="{{ route('admin.store.category', $value) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>