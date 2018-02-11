<div class="row">
    <div class="col-md-4">

        <div class="form-group {{ $errors->has('name') ? ' has-error' : 'has-feedback'}}">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

    </div>
    <div class="col-md-4">
    
        <div class="form-group {{ $errors->has('email') ? ' has-error' : 'has-feedback' }}">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', $user->email) }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

    </div>

</div>
<div class="row">

    <div class="col-md-4">
        <div class="form-group has-feedback">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
      <div class="form-group has-feedback">
        <label>Retype password</label>
        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required>
      </div>
    </div>

</div>