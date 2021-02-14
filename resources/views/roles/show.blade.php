@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Role : {{ $roles->name }}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col lg 4"></div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-action">
                            <a href="{{ route('roles.index')}}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <span class="badge badge-dark">{{ $roles->name }}</span>
                                        </th>
                                        <th scope="col">
                                            @if (!empty($rolePermission))
                                            @foreach ($rolePermission as $value)
                                                <span class="badge badge-info">{{ $value->name }}</span>
                                            @endforeach
                                        @endif
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                      </div>
                </div>
            </div>
            <div class="col lg 4"></div>
        </div>
    </div>
</section>
@endsection