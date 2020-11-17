@extends('layouts.app')

@section('title', 'Reservation Table')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endpush

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @include('layouts.partial.msg')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Reservation - Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered">
                  <thead class=" text-primary">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Date N Time</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Sent AT</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    @foreach ($reservations as $key => $reservation)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $reservation->name }}</td>
                          <td>{{ $reservation->phone }}</td>
                          <td>{{ $reservation->email }}</td>
                          <td>{{ $reservation->date_and_time }}</td>
                          <td>{{ $reservation->message }}</td>
                          <td>
                            @if($reservation->status == true)
                              <span class="lebel lebel-info">Confirmed</span>
                            @else
                              <span class="lebel lebel-info">Not confirmed yet</span>
                            @endif
                          </td>
                          <td>{{ $reservation->created_at }}</td>
                          <td>
                            {{-- reservation status --}}
                            @if($reservation->status == false)
                              <form id="status-form-{{$reservation->id}}" action="{{ route('reservation.status', $reservation->id) }}" method="POST" style="display: none;">
                                @csrf

                              </form>
                              <button type="button" class="btn btn-info btn-sm" onclick="if (confirm('Do you verify this request by phone ?')) {
                                event.preventDefault();
                                document.getElementById('status-form-{{$reservation->id}}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="material-icons">done</i></button>
                            @endif
                            {{-- category delete --}}
                            <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure ? You want to delete this ?')) {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $reservation->id }}').submit();
                            }else{
                              event.preventDefault();
                            }"><i class="material-icons">delete</i></button>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection


@push('script')

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table').DataTable();
  } );
</script>


@endpush