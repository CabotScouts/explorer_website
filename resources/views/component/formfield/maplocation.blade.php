<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
@forelse($dataTypeContent->getCoordinates() as $point)
    <input type="hidden" name="{{ $row->field }}" value="{{ $point['lat'] }}, {{ $point['lng'] }}" id="coordinates"/>
@empty
    <input type="hidden" name="{{ $row->field }}" value="{{ config('voyager.googlemaps.center.lat') }}, {{ config('voyager.googlemaps.center.lng') }}" id="coordinates"/>
@endforelse

<script type="application/javascript">
    function initMap() {
        @forelse($dataTypeContent->getCoordinates() as $point)
            var center = {lat: {{ $point['lat'] }}, lng: {{ $point['lng'] }}};
        @empty
            var center = {lat: {{ config('explorers.map.centre.latitude') }}, lng: {{ config('explorers.map.centre.longitude') }}};
        @endforelse
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: {{ config('voyager.googlemaps.zoom') }},
            center: center
        });
        var markers = [];
        @forelse($dataTypeContent->getCoordinates() as $point)
            var marker = new google.maps.Marker({
                    position: {lat: {{ $point['lat'] }}, lng: {{ $point['lng'] }}},
                    map: map,
                    draggable: true
                });
            markers.push(marker);
        @empty
            var marker = new google.maps.Marker({
                    position: center,
                    map: map,
                    draggable: true
                });
        @endforelse

        google.maps.event.addListener(marker,'dragend',function(event) {
            document.getElementById('coordinates').value = `${this.position.lat()}, ${this.position.lng()}`;
        });
    }
</script>
<div id="map"></div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('voyager.googlemaps.key') }}&callback=initMap"></script>
