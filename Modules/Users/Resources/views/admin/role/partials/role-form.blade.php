
<div class="row">
    <div class="col-md-2">
        <div class="box box-primary">

            <div class="box-header with-border text-center">
                <h3 class="box-title">Role</h3>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : 'has-feedback'}}">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name', $role->name) }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border text-center">
                <h3 class="box-title">PERMISSIONS</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                    
                        <div class="text-center">
                                <span class="btn btn-primary btn-xs" id="check-all-permissions">Check All</span>
                                <span class="btn btn-primary btn-xs pull-righ" id="uncheck-all-permissions">Uncheck All</span>
                            </div>

                        <ol class="products-list product-list-in-box pre-scrollable">
                            
                            @foreach($permissions as $permision)
                                <li class="item">

                                    <div class="product-img">
                                        <input type="checkbox" name="permissions[{{ $permision->id }}]" {{ ($role->hasPermissionTo($permision->name))?'checked':'' }}>
                                    </div>

                                    <div class="product-info product-description text-black">
                                        {{ ($permision->type == "route") ? $permision->altered_name : $permision->name }}
                                    </div>
                                    
                                </li>
                            @endforeach
                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include("users::admin.role.partials.role-form-scripts")

