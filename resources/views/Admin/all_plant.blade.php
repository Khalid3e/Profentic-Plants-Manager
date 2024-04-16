@extends('layouts.admin_master')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">{{ __('messages.home') }}</li>
        <li class="breadcrumb-item active">Plants</li>
    </ol>
    <script src="extensions/export/bootstrap-table-export.js"></script>

    <div class="card mb-4">
        <div class="card-header">

            <div>
                <i class="fas fa-table"></i>
                {{ __('messages.plantlist') }}
            </div>
            <hr>
            <div class=" row row p-2 d-flex">
                <a class="btn btn-sm btn-success" href="{{ route('add.plant') }}"><i class="fa fa-plus"></i>Add</a>

                <div class="flex-grow-1  mr-2 ">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend ">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-search"></i>{{ __('messages.search') }} :
                            </span>

                        </div>
                        <input class="form-control" type="text" placeholder="..." aria-label="Search"
                            aria-describedby="basic-addon2" id="search_plants" />

                    </div>
                </div>

                <a class="btn btn-sm btn-danger disabled" href="#" id="deleteSelectedPlants"><i
                        class="fa fa-times"></i>{{ __('messages.actions.deleteselected') }}</a>
                <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#import-modal"><i
                        class="fa fa-file-import"></i>{{ __('messages.actions.import') }}


                    <a class="btn btn-sm btn-primary" href="{{ route('export') }}"><i class="fa fa-file-export"></i>{{ __('messages.actions.export') }}</a>


            </div>




        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="plantstable" class="table table-hover align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"><input type="checkbox" id="select_all_ids"></th>
                            <th scope="col">{{ __('messages.attr.code') }}</th>
                            <th scope="col">{{ __('messages.attr.variety') }}</th>
                            <th scope="col">{{ __('messages.attr.certified') }}</th>

                            <th scope="col">{{ __('messages.attr.quantity') }}</th>
                            <th scope="col">{{ __('messages.attr.age') }}</th>
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

                                    $("{{'#deleteSinglePlant'. $row->id}}").on('click', function(){
                                        if (confirm("Are you sure?")) {
                                        document.location.href="{{ 'delete-plant/' . $row->code }}";
                                    }
                                    });
                                    
                                });

                                function myFunction(e) {
                                    var checkBox = e;
                                    var parentRow = e.id.replace("check", 'primaryrow');
                                    if (checkBox.checked == true) {
                                        $("#" + parentRow).addClass("table-active");
                                    } else {
                                        $("#" + parentRow).removeClass("table-active");
                                    }
                                }
                            </script>
                            <tr style="padding: 5px;" id="primaryrow{{ $row->id }}" class="checkablerow">
                                <td scope="row">
                                    <input id="check{{ $row->id }}" onchange="myFunction(this)" type="checkbox"
                                        class="checkbox" name="ids" data-id="{{ $row->code }}" >
                                </td>
                                <th scope="row" onClick="document.location.href='{{ 'details-plant/' . $row->id }}';"
                                    style="cursor: pointer;">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="mb-0 text-sm">{{ $row->code }}</span>
                                        </div>
                                    </div>

                                </th>

                                <td onClick="document.location.href='{{ 'details-plant/' . $row->id }}';"
                                    style="cursor: pointer;">{{ $row->variety }}</td>

                                <td onClick="document.location.href='{{ 'details-plant/' . $row->id }}';"
                                    style="cursor: pointer;">
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
                                <td onClick="document.location.href='{{ 'details-plant/' . $row->id }}';"
                                    style="cursor: pointer;">{{ $row->quantity }}</td>
                                <td onClick="document.location.href='{{ 'details-plant/' . $row->id }}';"
                                    style="cursor: pointer;">
                                    {{ \Carbon\Carbon::parse($row->transplanting_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days') }}
                                </td>

                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="{{ 'details-plant/' . $row->id }}" class="btn btn-info btn-sm m-0 p-2"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-pencil-alt m-0 p-0"></i></a>
                                        <a  class="btn btn-danger btn-sm m-0 p-2"
                                            data-toggle="tooltip" data-placement="top" title="Delete" id="{{'deleteSinglePlant'. $row->id }}"><i
                                                class="fa fa-times m-0 p-0" ></i></a>
                                    </div>

                                </td>
                            </tr>
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
        function clickedOption(el) {
            document.getElementById("filter-by").innerHTML = el.text;
        }
        $(document).ready(function() {
            $(".checkbox").prop('checked', false);
            $("#search_plants").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                //var selectedFilter = document.getElementById("filter-by").text;
                $("#plantstablebody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });

            });
            $('#select_all_ids').on('click', function(e) {
                var parentRow = $(".checkbox").prop("id").replace("check", 'primaryrow');
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                    $(".checkablerow").addClass("table-active");
                    $('#deleteSelectedPlants').removeClass('disabled');
                    document.getElementById('deleteSelectedPlants').disabled = false;

                } else {
                    $(".checkbox").prop('checked', false);
                    $(".checkablerow").removeClass("table-active");
                    $('#deleteSelectedPlants').addClass('disabled');
                    document.getElementById('deleteSelectedPlants').disabled = true;

                }
            });
            $('.checkbox').on('click', function() {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#select_all_ids').prop('checked', true);
                } else {
                    $('#select_all_ids').prop('checked', false);
                }
                if ($('.checkbox:checked').length > 0) {
                    $('#deleteSelectedPlants').removeClass('disabled');
                    document.getElementById('deleteSelectedPlants').disabled = false;
                } else {
                    $('#deleteSelectedPlants').addClass('disabled');
                    document.getElementById('deleteSelectedPlants').disabled = true;
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
                                $('#deleteSelectedPlants').removeClass('disabled');
                                document.getElementById('deleteSelectedPlants').disabled = false;

                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                    }
                }
            });



        });
    </script>
@endsection
