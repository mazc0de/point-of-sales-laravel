@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <h4>Nama {{$user->name}}</h4>
                          <h4>Email {{$user->email}}</h4>
                          <h4>Nama {{$user->name}}</h4>
                        </div>
                        <div class="card-body">
                          This is some text within a card body.
                        </div>
                        <div class="card-footer">
                          Footer Card
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection

