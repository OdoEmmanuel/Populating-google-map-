<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Populating Google Map</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 1rem 2em;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <h2>Resturant</h2>
                <div class="map" id="app">
                    {{-- google map goes here --}}
                    <gmap-map
                        :center="mapCenter"
                        :zoom="10"
                        style="width: 100%; height: 440px;"
                        @click="handleMapClick"
                    >
                        <gmap-info-window
                            :options="infoWindowOptions"
                            :position="infoWindowPosition"
                            :opened="infoWindowOpened"
                            @closeclick="handleInfoWindowClose"
                        >

                        <div class="info-window">

                            <h2 v-text="activeResturant.name"></h2>
                            <h5 v-text="'Hours:' + activeResturant.hours"></h5>
                            <p v-text="activeResturant.address"></p>
                            <p v-text="activeResturant.city + ', ' + activeResturant.state"></p>
                        </div>
                        </gmap-info-window>
                        <gmap-maker
                            v-for="(r, index) in resturants"
                            :key="r.id"
                            :position="getPosition(r)"
                            :clickable="true"
                            :draggable="false"
                            @click="handleMarkerClicked(r)"
                        ></gmap-maker>
                    </gmap-map>
                </div>
            </div>
        </div>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
