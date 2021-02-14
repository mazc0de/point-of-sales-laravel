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
                            <form action="{{ route('roles.edit',$roles)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')??$roles->name}}">
                                    @error('name')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <strong>Permission</strong> <br>
                                    @foreach ($permissions as $permission)
                                        <input type="checkbox" id="permission" name="permission[]" value="{{$permission->id}}" {{in_array($permission->id, $rolePermission) ? 'checked':''}} >
                                        <label for="permission">{{$permission->name}}</label><br>
                                    @endforeach
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