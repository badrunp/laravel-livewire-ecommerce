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
                            <h4>Sale info</h4>
                            <div>
                                <a href="{{ route('admin.store.sale', ['sale' => $sale->id]) }}" class="btn btn-primary btn-sm">Setting Date</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Sale Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($sale)
                            <tr>
                                <td>#</td>
                                <td>{{ $sale->sale_date }}</td>
                                <td>
                                    @if($sale->status == 'active')
                                        <button class="btn btn-danger" type="submit" wire:click.prevent="updateStatus({{$sale->id}})">Un active</button>
                                    @else
                                        <button class="btn btn-success" type="submit" wire:click.prevent="updateStatus({{$sale->id}})">Active</button>
                                    @endif
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="3" class="text-center">
                                    Sales is empty!
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>