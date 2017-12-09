@extends('layout')

@section('content')
    <div class="row">
        @include('listgroup')
        <div class="col-12 col-md-6 ">
            <div class="card mb-3">
                <div id="map" style="width:100%;height:400px;"></div>
            </div>
        </div>
        <div class="col-12 col-md-3 ">
            <div id="tarshcan-info" class="card ">
                <form class="form-group" action="/trashcan/add">
                    <div class="card-header">
                        <input type="text" value="">
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="latitude" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="longitude" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="주소">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="height" placeholder="높이">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="area" placeholder="바닥 면적">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="capacity" placeholder="용량">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="pid" placeholder="아두이노 아이디">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/map.js') }}"></script>
    <script>
        var position = new naver.maps.LatLng(Cookies.get('latitude'), Cookies.get('longitude'));

        var map = new naver.maps.Map('map', {
            center: position,
            zoom: 10
        });

        var marker = new naver.maps.Marker({
            position: position,
            map: map
        });

        naver.maps.Event.addListener(map, 'click', function (e) {
            $('input[name=latitude]').val(e.coord.x);
            $('input[name=longitude]').val(e.coord.y);
            marker.setPosition(e.coord);
        });
    </script>
@endsection