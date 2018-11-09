@extends('layouts.master')

@section('content')


@foreach ($article as $object)


 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $judul }}</h4>
                                 @include('includes.flasherror')
                            </div>
                            <div class="content">
                                  {!! Form::model($object, ['method' => 'PATCH', 'url' => url('/articles', $object->id_articles), 'class' => 'form-horizontal']) !!}
                                 {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ old('title', $object->title) }}">
                                        </div>
                                        <div class="col-md-3">
                                                <label>Content</label>
                                                <input type="text" class="form-control" name="body" value="{{ old('body', $object->body) }}">
                                        </div>
                                        <div class="col-md-4">
                                                <label for="exampleInputEmail1">Published On</label>
                                                 <input type="text" class="form-control" name="published_at" value="{{ old('body', $object->published_at) }}" readonly="">
                                        </div>
                                    </div>

                                    <div class="row" id="old">
                                        <div class="col-md-5">
                                                <label>Provinsi</label>
                                                <input type="hidden" class="form-control" name="provinsi_id" value="{{ old('provinsi_id', $object->provinsi_id) }}" readonly="">
                                                <p>{{$object->provinsi_name}}</p>
                                        </div>
                                        <div class="col-md-3">
                                                <label>Kota</label>
                                                <input type="hidden" class="form-control" name="city_id" value="{{ old('city_id', $object->city_id) }}" readonly="">
                                                <p>{{$object->city_name}}</p>
                                        </div>
                                        <div class="col-md-4">
                                                <label for="exampleInputEmail1">Kecamatan</label>
                                                <input type="hidden" class="form-control" name="district_id" value="{{ old('district_id', $object->district_id) }}" readonly="">
                                                <p>{{$object->district_name}}</p>
                                        </div>
                                    </div>
                                    <input  type="checkbox" id="triggerDiv" style="margin-left: 4px;"> Klik Jika Ubah Lokasi
                                <br/>


                                    <div class="row" id="new">

                                        <div class="col-md-4">
                                                <label>Provinsi</label>
                                                <select name="provinsi_id" class="form-control">
                                                @foreach ($provinsi as $key => $value)
                                                    <option value={{$key}} {{(old('provinsi_id') == $key?'selected':'')}} >{{$value}}</option>
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
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="district_id"]').empty();
            }
        });

        //button reset
        $('#reset').click(function(){
        $('select[name="city_id"]').prop("disabled", true);
        $('select[name="district_id"]').prop("disabled", true);
        $("#new").hide(1000);
        $("#old").show(1000);
        });

        // checkbox
        $("#new").hide();
        $("#triggerDiv").click(function() {
            if($(this).is(":checked")) {
                $("#new").show(1000);
                $("#old").hide(1000);
            }else {
                $("#new").hide(1000);
                $("#old").show(1000);
            }
        });
    }); //end document ready
</script>


@endforeach



@endsection
