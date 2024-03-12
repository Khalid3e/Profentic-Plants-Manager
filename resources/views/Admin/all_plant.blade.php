@extends('layouts.admin_master')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Plants</li>
    </ol>
    <script src="extensions/export/bootstrap-table-export.js"></script>
    <div class="card mb-4">
        <div class="card-header">

            <div>
                <i class="fas fa-table mr-1"></i>
                Plant List
            </div>
            <hr>
            <div class="row row p-2 ">
                <a class="btn btn-sm btn-success" href="{{ route('add.plant') }}"><i class="fa fa-plus"></i>Add</a>
                <a class="btn btn-sm btn-danger" href="#" id="deleteSelectedPlants"><i class="fa fa-times"></i>Delete
                    Selected</a>
                <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#import-modal"><i
                        class="fa fa-file-import"></i>Import


                    <a class="btn btn-sm btn-primary" href="{{ route('export') }}"><i class="fa fa-file-export"></i>Export
                        All</a>


            </div>
            <div class="row row p-2 ">

                <div class="input-group input-group-sm">
                    <div class="input-group-prepend ">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>

                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2" id="search_plants" />

                </div>
            </div>



        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="plantstable" class="table table-hover align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"><input type="checkbox" id="select_all_ids"></th>
                            <th scope="col">Code</th>
                            <th scope="col">Variety</th>
                            <th scope="col">Certified</th>

                            <th scope="col">Quantity</th>
                            <th scope="col">Age</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody id="plantstablebody">
                        @foreach ($plants as $row)
                            <script>
                                $(document).ready(function() {
                                    $("#collapsePlants").addClass("show");
                                    $("#plantsitem").removeClass("collapsed");
                                    $("#view-{{ $row->id }}").click(function() {
                                        $("#primaryrow{{ $row->id }}").toggleClass("table-success");
                                        $("#secondaryrow{{ $row->id }}").toggleClass("table-success");
                                        $("#view-{{ $row->id }}").toggleClass("active");
                                    });
                                    $('*[data-href]').on('click', function() {
                                        window.location = $(this).data("href");
                                    });
                                });
                            </script>
                            <tr style="padding: 5px;" id="primaryrow{{ $row->id }}">
                                <td scope="row" rowspan="1">
                                    <input type="checkbox" class="checkbox" name="ids"
                                        data-id="{{ $row->code }}" >
                                </td>
                                <th scope="row" rowspan="1">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="mb-0 text-sm">{{ $row->code }}</span>
                                        </div>
                                    </div>

                                </th>

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
                                <td>{{ $row->quantity }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->transplanting_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days') }}
                                </td>

                                <td class="text-right">
                                    <div class="action-list">
                                        <a href="{{ 'plant-details/' . $row->id }}" class="btn btn-sm btn-info"><i
                                                class="fa fa-pencil-alt"></i>Edit</a>
                                        <a href="{{ 'delete-plant/' . $row->id }}" class="btn btn-sm btn-danger"><i
                                                class="fa fa-times"></i>Delete</a>
                                        <a style="color: white;" class="btn btn-sm btn-success" data-toggle="collapse"
                                            data-target="{{ '#infodiv' . $row->id }}" id="{{ 'view-' . $row->id }}"><i
                                                class="fa fa-eye"></i>Details</a>

                                    </div>

                                </td>
                            </tr>
                            {{-- <tr id="secondaryrow{{$row->id}}">
                                        <td colspan="5"   style="padding: 0 !important;">
                                            <div id="{{ 'infodiv' . $row->id }}" class="collapse in">
                                                Lot: {{ $row->lot}}<br>
                                                Quantity: {{ $row->quantity }}<br>
                                                OMV: {{ $row->omv}}<br>
                                                Transplanting Date: {{ $row->transplanting_date}}
                                            </div>
                                        </td>
                                    </tr> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="import-modal" tabindex="-1" role="dialog" aria-labelledby="import-modal-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="import-modal-label">Import Plants from CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="file" name="file" accept=".csv">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" type="button" class="btn btn-primary">Import CSV</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#search_plants").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#plantstablebody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });

            });
            $('#select_all_ids').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });
            $('.checkbox').on('click', function() {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#select_all_ids').prop('checked', true);
                } else {
                    $('#select_all_ids').prop('checked', false);
                }
            });
            $('#deleteSelectedPlants').on('click', function(e) {
                var studentIdArr = [];
                $(".checkbox:checked").each(function() {
                    studentIdArr.push($(this).attr('data-id'));
                });
                if (studentIdArr.length <= 0) {
                    alert("Choose min one item to remove.");
                } else {
                    if (confirm("Are you sure?")) {
                        var stuId = studentIdArr.join(",");
                        $.ajax({
                            url: "{{ route('plant.delete') }}",
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + stuId,
                            success: function(data) {
                                if (data['status'] == true) {
                                    $(".checkbox:checked").each(
                                        function() {
                                            $(this).parents("tr")
                                                .remove();
                                        });
                                    alert(data['message']);
                                } else {
                                    alert('Error occured.');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                    }
                }
            });



        });
        /* $(function(e) {
            $("#select_all_ids").click(function () {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });

            $('#deleteSelectedPlants').click(function(e){
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function(){
                    
                    all_ids.push($(this).attr('data-id'));
                });
                $.ajax({
                    url:"{{ route('plant.delete') }}",
                    type:"DELETE",
                    data:{
                        ids:all_ids,
                        _token:'{{ csrf_token() }}'
                    },
                    success:function(response){
                        $.each(all_ids,function(key,val){
                            console.log(val);
                            $('#primaryrow'+val).remove();
                        })
                    },
                    
                });
            });
        }); */
    </script>
@endsection
