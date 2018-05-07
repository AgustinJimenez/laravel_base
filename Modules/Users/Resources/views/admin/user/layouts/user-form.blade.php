<!--BEGIN USER DATAS TAB-->
<div class="row">
    <div class="col-md-4">
        <div class="box box-primary with-border">
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : 'has-feedback'}}">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6">
                    
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : 'has-feedback' }}">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', $user->email) }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                @if( !$user->id )
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                        </div>

                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">SAVE</button>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

    <div class="col-md-2">
        <div class="box box-primary with-border">
            <div class="row">
                <div class="box-body">
                    <div class="col-md-12">
                    
                        <div class="text-center">
                            <label>Roles</label>
                        </div>
                        

                        <ul class="products-list product-list-in-box">
                            @foreach($roles as $role)
                                <li class="item">

                                    <div class="product-img">
                                        <input type="checkbox" name="roles[{{ $role->id }}]" {{ ($user->hasRole($role->name))?"checked":"" }}>
                                    </div>

                                    <div class="product-info product-description text-black">
                                        {{ $role->name }}
                                    </div>
                                    
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if( $user->id )
        <div class="col-md-4">
            <div class="box box-primary with-border collapsed-box">

                <div class="box-header">
                    <div class="text-center">
                        <label>Actual Permissions</label>
                    </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="col-md-12">
        
                        <ul class="products-list product-list-in-box pre-scrollable">
                            @foreach($user->getPermissionsViaRoles() as $permission)
                                <li class="item">

                                    <div class="product-info product-description text-black">
                                        {{ $permission->name }}
                                    </div>
                                    
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    @endif
    <script type="text/javascript">
  
        $(".btn-box-tool").click(function(event)
        {
            event.preventDefault();
            $(this)
            .closest(".box")
            .find("i")
            .toggleClass("fa-plus fa-minus")
            .closest(".box")
            .find(".box-body")
            .stop()
            .toggle("fast");
        });
        
      
      </script>

</div>
    <!--END USER DATAS TAB-->