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
                            <h4>All Products</h4>
                            <div>
                                <a href="{{ route('admin.create.category') }}" class="btn btn-primary btn-sm">Create</a>
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
                                <th>Name</th>
                                <th>Stok</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $value)
                            <tr>
                                <td>{{ $products->firstItem() + $key }}</td>
                                <td>
                                    <img src="{{ asset('assets/images/products/' . $value->image) }}" alt="" width="100">
                                </td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ $value->regular_price }}</td>
                                <td>{{ $value->category->name }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="confirm('yes or not?') ? Livewire.emit('deleteProduct',{{ $value->id }}) : false">Delete</button>
                                    <a href="{{ route('admin.create.category', $value) }}" class="btn btn-success btn-sm">Edit</a>
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