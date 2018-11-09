@extends('layouts.master')

@section('content')



 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $judul }}</h4>
                                 @include('includes.flasherror')
                            </div>
                            <div class="content">
                                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/articles') }}">
                                 {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                        </div>
                                        <div class="col-md-3">
                                                <label>Content</label>
                                                <input type="text" class="form-control" name="body" value="{{ old('body') }}">

                                        </div>
                                        <div class="col-md-4">
                                                <label for="exampleInputEmail1">Published On</label>
                                                 <input data-date-format="mm/dd/yyyy" id="published_at" type="date" class="form-control" name="published_at" placeholder="2019-12-31">
                                        </div>


                                    </div>




                                    <div class="row">

                                        <div class="col-md-4">
                                                <label>Provinsi</label>
                                                <select name="provinsi_id" class="form-control">
                                                <option value="">Pilih Provinsi</option>
                                                @foreach ($provinsi as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                                </select>
                                        </div>



                                        <div class="col-md-4">
                                                <label>Kota</label>
                                                <select name="city_id" class="form-control" disabled>
                                                </select>

                                        </div>

                                         <div class="col-md-4">
                                                <label>Kecamatan</label>
                                                <select name="district_id" class="form-control" disabled>
                                                </select>
                                        </div>

                                    </div>



                                    <button type="reset" class="btn btn-default btn-fill pull-right">Reset</button>
                                    <button type="submit" class="btn btn-info btn-fill">Save</button>
                                    <a type="button" class="btn btn-primary" href="{{ url('articles/') }}"> Back </a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="provinsi_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/articles/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="city_id"]').empty();
                        $('select[name="city_id"]').attr("disabled", false);
                        $('select[name="city_id"]').append($('<option></option>').val("").html("Pilih Kota"));
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="city_id"]').empty();
            }
        });
    //==================
     $('select[name="city_id"]').on('change', function() {
            var cityID = $(this).val();
            if(cityID) {
                $.ajax({
                    url: '/articles/ajaxdistrict/'+cityID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="district_id"]').empty();
                        $('select[name="district_id"]').attr("disabled", false);
                        $('select[name="district_id"]').append($('<option></option>').val("").html("Pilih Kecamatan"));
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="district_id"]').empty();
            }
        });



    }); //end document ready
</script>

@endsection
