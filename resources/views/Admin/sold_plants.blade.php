@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Sold Plants
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Plant Name</th>
                        <th>Quantity</th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($plants as $row)
                    <tr>
                        <td>{{ $row->plant_name }}</td>
                        <td>{{ $row->count }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
