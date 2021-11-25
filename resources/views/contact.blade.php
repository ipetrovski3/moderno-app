@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Контакт</h1>
            <p>
                Доколку имате предлог, прашања или сте заинтересирани за деловна соработка Ве молиме да не контактирате
                преку формата прикажана подоле.
            </p>
        </div>
    </div>

    <!-- Start Map -->
    {{-- <div id="mapid" style="width: 100%; height: 300px;"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script>
        var mymap = L.map('mapid').setView([-23.013104, -43.394365, 13], 13);

        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Zay Telmplte | Template Design by <a href="https://templatemo.com/">Templatemo</a> | Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

        L.marker([-23.013104, -43.394365, 13]).addTo(mymap)
            .bindPopup("<b>Zay</b> eCommerce Template<br />Location.").openPopup();

        mymap.scrollWheelZoom.disable();
        mymap.touchZoom.disable();
    </script> --}}
    <!-- Ena Map -->

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form" action="{{ route('store.contact') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Име</label>
                        <input type="text" class="form-control mt-1" id="name" name="name">
                        @if ($errors->has('name'))
                            <small class="text-danger"> {{ $errors->first('name') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Емаил</label>
                        <input type="email" class="form-control mt-1" id="email" name="email">
                        @if ($errors->has('email'))
                            <small class="text-danger"> {{ $errors->first('email') }} </small>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Наслов</label>
                    <input type="text" class="form-control mt-1" id="subject" name="title">
                    @if ($errors->has('title'))
                        <small class="text-danger"> {{ $errors->first('title') }} </small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Порака</label>
                    <textarea class="form-control mt-1" id="message" name="message" rows="8"></textarea>
                    @if ($errors->has('message'))
                        <small class="text-danger"> {{ $errors->first('message') }} </small>
                    @endif
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Испрати</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
