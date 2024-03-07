@extends('layouts.admin_master')

@section('content')
    <main>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <div class="">
            <div class="">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa fa-plus"></i>Add New Plant
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ url('/insert-plant') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="input-group input-group-sm  mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Code</span>
                                            </div>
                                            <input class="form-control " name="code" type="text" placeholder=""
                                                onkeydown="return /[0-9]/i.test(event.key)" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm  mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Quantity</span>
                                            </div>
                                            <input class="form-control " name="quantity" type="number" min="0"
                                                placeholder="" />
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch m-0">
                                            <input type="checkbox" class="form-check-input" role="switch" id="is_certified"
                                                name="is_certified" {{ old('is_certified') ? 'checked="checked"' : '' }}>
                                            <label class="form-check-label" for="is_certified">Certified</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="input-group input-group-sm  mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Place</span>
                                            </div>

                                            <input class="form-control " name="place" type="text" placeholder=""
                                                list="list-places" id="input-datalist">
                                            <datalist id="list-places">
                                                <option>Asia/Aden</option>
                                                <option>Asia/Aqtau</option>
                                                <option>Asia/Baghdad</option>
                                                <option>Asia/Barnaul</option>
                                                <option>Asia/Chita</option>
                                                <option>Asia/Dhaka</option>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="input-group input-group-sm  mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Variety</span>
                                            </div>
                                            <input class="form-control " name="variety" type="text" placeholder=""
                                                list="list-varieties" id="input-datalist">
                                            <datalist id="list-varieties">

                                                <option>Asia/Famagusta</option>
                                                <option>Asia/Hong_Kong</option>
                                                <option>Asia/Jayapura</option>
                                                <option>Asia/Kuala_Lumpur</option>
                                                <option>Asia/Jakarta</option>
                                            </datalist>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="input-group input-group-sm  mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Lot Number</span>
                                            </div>
                                            <input class="form-control " name="lot" type="text" placeholder="" />
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="input-group input-group-sm  mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">OMV</span>
                                            </div>
                                            <input class="form-control " name="omv" type="text" placeholder="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="input-group input-group-sm  mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Transplanting Date</span>
                                            </div>
                                            <input class="form-control " name="transplanting_date" type="date"
                                                placeholder="" />
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group mt-4 mb-0"><button
                                        class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', e => {
            $('#input-datalist').autocomplete()
        }, false);
    </script>
@endsection
