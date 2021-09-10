<div class="container" style="padding: 30px 0;">
    <div class="row" style="display: flex; justify-content: center">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Sale Setting</h4>
                </div>
                <div class="panel-body" style="padding: 20px 40px">
                    <form action="" class="form-horizontal" wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="status" class="control-label">Status</label>
                            <select wire:model.lazy="status" id="sale_status" class="form-control">
                                <option value="active">Active</option>
                                <option value="unactive">Un Active</option>
                            </select>
                            @error('status')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sale_date" class="control-label">Date</label>
                            <input type="text" class="form-control input-md" placeholder="YYYY/MM/DD H:M:S" id="sale-date" wire:model.lazy="sale_date">
                            @error('sale_date')
                            <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $('#sale-date').datetimepicker({
                format: 'Y-MM-DD h:m:s'
            })
            .on('dp.change', function(ev){
                @this.set('sale_date', $('#sale-date').val())
            })
        })
    </script>
@endpush