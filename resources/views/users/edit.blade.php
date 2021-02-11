@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">{{$title}}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4>HTML5 Form Basic</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.create')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') ?? $user->name}}">
                                    @error('name')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('name') ?? $user->email}}" >
                                    @error('email')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"
                                        placeholder="Set account password" name="password" tabindex="2">
                                    @error('password')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input id="password_confirmation" type="password" placeholder="Confirm account password"
                                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                                        name="password_confirmation" tabindex="2">
                                    @error('password_confirmation')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Roles</label>
                                    <select class="form-control" multiple="" data-height="100%" style="height: 100%;" name="roles[]">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection