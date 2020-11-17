@extends('layouts.app')

@section('title', 'Contacts Details')

@push('css')


@endpush

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">
                <strong>Subject: {{ $contact->subject }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <strong>Name: {{ $contact->name }}</strong>
              <br>
              <strong>Email: {{ $contact->email }}</strong>
              <br>
              <strong>Message: {{ $contact->message }}</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection


@push('script')



@endpush