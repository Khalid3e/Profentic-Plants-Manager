@extends('layouts.admin_master')

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Plants</li>
        <li class="breadcrumb-item active"> {{ $plant->code }}</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header" style="font-weight: 600">
            <i class="fa fa-bars"></i>
            Details of {{ $plant->code }}

            <a class="btn btn-sm btn-primary float-right" href="{{ route('add.plant') }}"><i
                    class="fa fa-pencil-alt"></i>Edit</a>
        </div>
        <div class="card-body p-4 row d-flex" style="font-size: .8125rem;">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-3">
                        Code
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $plant->code }}
                    </div>
                </div>                
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        Place
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $plant->place }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        Variety
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $plant->variety }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        Lot
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $plant->lot }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        Certification
                    </div>
                    @if ($plant->is_certified)
                        <div class="col-sm-9 text-success">
                            <span class="badge badge-dot"> <i class="bg-success"></i> Certified</span>
                        </div>
                    @else
                        <div class="col-sm-9 text-danger">
                            <span class="badge badge-dot"> <i class="bg-warning"></i> No</span>
                        </div>
                    @endif
                    
                </div>
                <hr>
    
                <div class="row">
                    <div class="col-sm-3">
                        Quantity
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $plant->quantity }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        Transplanting Date
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{\Carbon\Carbon::parse($plant->transplanting_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        OMV
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $plant->omv }}
                    </div>
                </div>
            </div>

            <div class="col-md-3 ml-2">
                QR Code
                <div class="row">
                    {!! DNS2D::getBarcodeSVG("$plant->code", 'QRCODE', 8, 8)!!}
                </div>
                {{-- <hr>
                C39 Code
                <div class="row">
                    {!! DNS2D::getBarcodeHTML("$plant->code", 'PHARMA2T') !!}
                </div> --}}
            </div>
            



        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', e => {
            $('#input-datalist').autocomplete()
        }, false);
    </script>
@endsection
