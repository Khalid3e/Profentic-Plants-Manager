@extends('layouts.admin_master')
@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Plants</li>
</ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Plant List
            <a class="btn btn-sm btn-success float-right" href="{{ route('add.plant') }}"><i class="fa fa-plus"></i>Add</a>
        </div>
        <div class="card-body">
                        <div class="table-responsive">
                            <table id="plantstable" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>

                                        <th scope="col">Code</th>
                                        <th scope="col">Place</th>
                                        <th scope="col">Variety</th>
                                        <th scope="col">Certified</th>
                                        <th scope="col">Age</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plants as $row)
                                        <script>
                                        $(document).ready(function(){
                                        $("#collapsePlants").addClass("show");
                                        $("#plantsitem").removeClass("collapsed");
                                        $( "#view-{{ $row->id }}").click(function(){
                                            $("#primaryrow{{$row->id}}").toggleClass("table-success");
                                            $("#secondaryrow{{$row->id}}").toggleClass("table-success");
                                            $("#view-{{ $row->id }}").toggleClass("active");
                                          });
                                        });
                                        </script>
                                    <tr style="padding: 5px;" id="primaryrow{{$row->id}}">
                                        <th scope="row" rowspan="2">
                                            <div class="media align-items-center">

                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">{{ $row->code }}</span>
                                                </div>
                                            </div>

                                        </th>
                                        <td>{{ $row->place }}</td>
                                        <td>{{ $row->variety }}</td>

                                        <td>
                                            @if ($row->is_certified)
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i> Certified
                                                </span>
                                            @else
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-warning"></i> No
                                                </span>
                                            @endif

                                        </td>

                                        <td>{{\Carbon\Carbon::parse($row->transplanting_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');}}</td>

                                        <td class="text-right">
                                            <div class="action-list">
                                                <a href="#" class="btn btn-sm btn-info"><i
                                                        class="fa fa-pencil-alt"></i>Edit</a>
                                                <a href="{{ 'delete-plant/' . $row->id }}"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-times"></i>Delete</a>
                                                <a
                                                    style="color: white;"
                                                    class="btn btn-sm btn-success"
                                                    data-toggle="collapse"
                                                    id="{{ 'view-' . $row->id }}"
                                                    data-target="{{ '#infodiv' . $row->id }}"><i class="fa fa-eye"></i>Details</a>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr id="secondaryrow{{$row->id}}">
                                        <td colspan="5"   style="padding: 0 !important;">
                                            <div id="{{ 'infodiv' . $row->id }}" class="collapse in">
                                                Lot: {{ $row->lot}}<br>
                                                Quantity: {{ $row->quantity }}<br>
                                                OMV: {{ $row->omv}}<br>
                                                Transplanting Date: {{ $row->transplanting_date}}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        </div>
    </div>
@endsection
