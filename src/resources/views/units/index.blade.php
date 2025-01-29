@extends('layouts.main')
@section('title', 'Units')
@section('content')
  <section class="wide-map">
    <div id="map"></div>
    <div class="map-overlay">
      <div class="map-title">
        <div class="container pad">
          <div class="row">
            <div class="col col-12 col-md-6 col-lg-8">
              <h1>Explorer Units</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      var unitmap = [];

      var markers = [
        @if (count($units) > 0)
          @foreach ($units as $u)
            @if ($u->day > -1 && $u->lat)
              {
                name: "{{ $u->name }}",
                day: "{{ $u->dayString }}s",
                lat: {{ $u->lat }},
                lng: {{ $u->lng }},
                url: "{{ route('unit.view', $u->shortname) }}"
              },
            @endif
          @endforeach
        @endif
      ];

      function addMarker(m) {
        markers[m].label = new google.maps.InfoWindow({
          content: `<a href="${ markers[m].url }"><strong>${ markers[m].name }</strong></a><br /><small>${ markers[m].day }</small>`
        });

        markers[m].marker = new google.maps.marker.AdvancedMarkerElement({
          position: {
            lat: markers[m].lat,
            lng: markers[m].lng
          },
          map: unitmap,
        });

        markers[m].marker.addListener('click', function() {
          for (i = 0; i < markers.length; i++) {
            markers[i].label.close();
          }
          markers[m].label.open(unitmap, markers[m].marker);
        });

        markers[m].marker.content.classList.add("drop");
      }

      function initMap() {
        unitmap = new google.maps.Map(
          document.getElementById('map'), {
            zoom: {{ config('explorers.map.zoom') }},
            center: {
              lat: {{ config('explorers.map.centre.latitude') }},
              lng: {{ config('explorers.map.centre.longitude') }}
            },
            disableDefaultUI: true,
            gestureHandling: 'cooperative',
            mapId: 'unitMap',
          });

        unitmap.addListener('click', function() {
          for (i = 0; i < markers.length; i++) {
            markers[i].label.close();
          }
        });

        for (var i = 0; i < markers.length; i++) {
          var add = function(x) {
            return function() {
              addMarker(x);
            }
          }
          setTimeout(add(i), i * 100);
        }
      }
    </script>
  </section>
  <section class="page units container pad space">
    <div class="row">
      <div class="page-content col col-12 mt-2">
        @if (isset($page))
          {!! $page->body !!}
        @endif
      </div>

      <div class="units-list col col-12">
        <div class="row">
          @if (count($units) > 0)
            @foreach ($units as $u)
              <div class="col col-12 col-md-6 col-lg-3">
                @include('component.unit.index-card', ['unit' => $u])
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </section>

  <script async
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.key') }}&loading=async&callback=initMap&libraries=marker">
  </script>
@endsection
