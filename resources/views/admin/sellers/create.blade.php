@extends('admin.layouts.mian')
@section('title', ' أنشاء تاجر')
@section('breadcrumb')
    {{ Breadcrumbs::render('sellers.create') }}
@endsection
@section('content')
    <div class="col-12">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('sellers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <h1 class="h1 text-center text-dark"> @yield('title') </h1>
                    </div>
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                            <div class="row my-4">
                                <div class="col-6">
                                    <button class="btn btn-primary form-control bg-primary text-light" type="button"
                                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne" id="seller">
                                        التاجر
                                    </button>
                                </div>
                                <div class="col-6">
                                    {{-- @if (can('Store Shop', 'admin')) --}}
                                    <button class="btn btn-outline-primary form-control" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo" id="branches">
                                        المحلات
                                    </button>
                                    {{-- @endif --}}
                                </div>
                                <div class="col-12 mt-4">
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="form-group">
                                            <label for="text">الأسم </label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control" id="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="national_id">الرقم القومي </label>
                                            <input type="number" name="national_id" value="{{ old('national_id') }}"
                                                class="form-control" id="national_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">رقم الهاتف </label>
                                            <input type="number" name="phone" value="{{ old('phone') }}"
                                                class="form-control" id="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">البريد الالكتروني </label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">كلمة مرور </label>
                                            <input type="password" name="password" value="{{ old('password') }}"
                                                class="form-control" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">تأكيد كلمة مرور </label>
                                            <input type="password" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}" class="form-control"
                                                id="password_confirmation">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">النوع</label>
                                            <select name="gender" class="custom-select" id="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">حالة البريد الالكتروني</label>
                                            <select name="email_verified_at" class="custom-select" id="status">
                                                @foreach ($statuses as $status => $value)
                                                    <option @selected(old('status') == $value) value="{{ $value }}">
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">حالة التاجر</label>
                                            <select name="status" class="custom-select" id="status">
                                                @foreach ($statuses as $status => $value)
                                                    <option @selected(old('status') == $value) value="{{ $value }}">
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <ul class="nav navbar-nav side-menu" id="social_side">

                                                <li>
                                                  
                                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#social" class="">
                                                        <div class="pull-right">
                                                      
                                                            <span class="right-nav-text"><h6>روابط مواقع التواصل الاجتماعى </h6></span>
                                                        </div>
                                                        <div class="pull-left"><i class="ti-plus"></i></div>
                                                        <div class="clearfix"></div>
                                                    </a>

                                                    <ul id="social" class="collapse" data-parent="#social_side">
                                                        <li class="my-2">
                                                            <div>
                                                                <label class="form-label " for="facebook"> الفيس بوك
                                                                </label>

                                                                <div>
                                                                    <input id="facebook" name="social_links[facebook]"
                                                                        type="url" placeholder="www.facebook.com/user"
                                                                        class="form-control" />
                                                                </div>

                                                            </div>

                                                            @error('social_links.facebook')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </li>
                                                        <li class="my-2">
                                                            <div>
                                                                <label class="form-label" for="linkedin"> لينكدان
                                                                </label>

                                                                <div>
                                                                    <input id="linkedin" name="social_links[linkedin]"
                                                                        type="url" placeholder="www.linkedin.com/user"
                                                                        class="form-control" />
                                                                </div>

                                                            </div>

                                                            @error('social_links.linkedin')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </li>
                                                        <li class="my-2">
                                                            <div>
                                                                <label class="form-label" for="quora">كوايرا </label>

                                                                <div>
                                                                    <input id="quora" name="social_links[quora]" type="url"
                                                                        placeholder="www.quora.com/user"
                                                                        class="form-control" />
                                                                </div>

                                                            </div>

                                                            @error('social_links.quora')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </li>
                                                        <li class="my-2">
                                                            <div>
                                                                <label class="form-label" for="instagram">انستجرام
                                                                </label>

                                                                <div>
                                                                    <input id="instagram" name="social_links[instagram]"
                                                                        type="url" placeholder="www.instagram.com/user"
                                                                        class="form-control" />
                                                                </div>

                                                            </div>

                                                            @error('social_links.instagram')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </li>
                                                        <li class="my-2">
                                                            <div>
                                                                <label class="form-label" for="twitter">تويتر </label>

                                                                <div>
                                                                    <input id="twitter" name="social_links[twitter]"
                                                                        type="url" placeholder="www.twitter.com/user"
                                                                        class="form-control" />
                                                                </div>

                                                            </div>

                                                            @error('social_links.twitter')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="form-group">
                                            <div class="repeater ">
                                                <div data-repeater-list="shop">
                                                    <div data-repeater-item class="my-3">
                                                        <div class="row">
                                                            <div class="col-4  mb-3">
                                                                <input class="form-control" name="name" type="text"
                                                                    placeholder="اسم المحل" />
                                                            </div>
                                                            <div class="col-4   mb-3">
                                                                <input class="form-control" name="street" type="text"
                                                                    placeholder="الشارع" />
                                                            </div>
                                                            <div class="col-4   mb-3">
                                                                <input class="form-control" name="building" type="text"
                                                                    placeholder="المبنى" />
                                                            </div>
                                                            <div class="col-4   mb-3">
                                                                <input class="form-control" name="floor" type="text"
                                                                    placeholder="الدور" />
                                                            </div>

                                                            <div class="col-4   mb-3">
                                                                <label for="">المنطقه</label>
                                                                <select name="region_id" class="form-control" id="">
                                                                    @foreach ($regions as $region)
                                                                        <option value="{{ $region->id }}">
                                                                            {{ $region->getTranslation('name', 'en') . '-' . $region->getTranslation('name', 'en') }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-4  mb-3">
                                                                <textarea name="notes" id="" cols="30" rows="1" class="form-control" placeholder="ملاحظات"></textarea>
                                                            </div>
                                                            <input type="hidden" name="latitude">
                                                            <input type="hidden" name="longitude">
                                                            <div class="col-lg-12">

                                                                <input class="btn btn-danger btn-lg" data-repeater-delete
                                                                    type="button" value="مسح الفرع" />

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input class="button btn-success btn-lg my-5" data-repeater-create
                                                    type="button" value="أضافة فرع" />

                                                <div id="googleMap" name="map" style="width:100%;height:400px;"
                                                    class="mb-4"></div>
                                                <div id="floating-panel">

                                                    <input id="delete-markers" onclick="deleteMarkers()"
                                                        class="btn btn-outline-danger" type="button"
                                                        value="مسح كل الفروع في الخريطة" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="create" value="create">انشاء</button>
                        <button type="submit" class="btn btn-primary" name="create" value='return'>انشاء & رجوع</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA_ByXqRRoZX8gjgRlUCGJ4F5Ot0THdkLc&callback=myMap">
    </script>

    <script>
        $('#seller').on('click', function() {
            $('#seller').toggleClass('bg-primary text-light');
            $('#branches').removeClass('bg-primary text-light');
        });
        $('#branches').on('click', function() {
            $('#branches').toggleClass('bg-primary text-light');
            $('#seller').removeClass('bg-primary text-light');
        });
        let markers = [];
        let removeMarkers = [];

        function myMap() {
            var mapProp = {
                center: new google.maps.LatLng(30.120655, 31.352292),
                zoom: 15,
            };
            var map = new google.maps.Map(
                document.getElementById("googleMap"),
                mapProp
            );

            function placeMarker(location) {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: "الفرع " + (markers.length + 1),
                });
                removeMarkers.push(marker);
                var lat = location.lat();
                var lng = location.lng();
                markers.push({
                    lat: lat,
                    lng: lng
                });
                for (let index = 0; index < markers.length; index++) {
                    document.getElementsByName(
                        "shop[" + index + "][latitude]"
                    )[0].value = markers[index].lat;
                    document.getElementsByName(
                        "shop[" + index + "][longitude]"
                    )[0].value = markers[index].lng;
                }
                // marker.addListener("dblclick", function() {
                //     marker.setMap(null);
                // });
            }
            google.maps.event.addListener(map, "click", function(event) {
                placeMarker(event.latLng);
            });
        }
        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < removeMarkers.length; i++) {
                removeMarkers[i].setMap(map);
            }
        }
        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            setMapOnAll(null);
            for (let index = 0; index < markers.length; index++) {
                document.getElementsByName(
                    "shop[" + index + "][latitude]"
                )[0].value = '';
                document.getElementsByName(
                    "shop[" + index + "][longitude]"
                )[0].value = '';
            }
            removeMarkers = [];
            markers = [];
        }

        $(document).ready(function() {
            $('.repeater, .repeater-file, .repeater-add').repeater({
                show: function() {
                    $(this).slideDown();
                }
            });
        });
    </script>
@endsection
@section('css')
    <style>
        .dropdawn {
            margin-right: 10px;
            font-size: 20px;
            cursor: pointer
        }

        #social_links {
            user-select: none;
        }

        ul {
            list-style: none
        }
    </style>
@endsection
