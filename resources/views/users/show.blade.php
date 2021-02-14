@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Profile : {{ $user->name }}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col lg 4"></div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-action">
                            <a href="{{ route('users.index')}}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="empty-state" data-height="400" style="height: 400px;">
                            <img src="{{ asset('img/avatar.png') }}" alt="" width="150" height="150" style="border-radius:50%">
                            <h2>{{ strtoupper($user->name)}}</h2>
                            <p>
                                Email : {{ $user->email}}
                            </p>
                            <a href="#" class="mt-4 bb">Need Help?</a>
                        </div>
                      </div>
                </div>
            </div>
            <div class="col lg 4"></div>
        </div>
    </div>
</section>
@endsection