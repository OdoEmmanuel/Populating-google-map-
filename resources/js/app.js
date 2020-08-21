require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import * as VueGoogleMaps from 'vue2-google-maps';
import Axios from 'axios';

Vue.use(VueGoogleMaps, {
    load: {
        key: ''
    }
});

const app = new Vue({
    el: '#app',
    data(){
        return {
            resturants: [],

            infoWindowOption: {
                pixelOffset:{
                    width: 0,
                    height: -35
                }
            },

            activeResturant: {},
            infoWindowOpened: false

        }
    },
    created(){
        axios.get('/api/resturants')
            .then((response) => this.resturants = response.data)
            .catch((error) => console.error(error));
    },

    methods: {
        getPosition(r){
            return {
                lat: parseFloat(r.latitude),
                lng: parseFloat(r.longitude)
            }
        },
        handleMarkerClicked(r){
            this.activeResturant = r;
            this.infoWindowOpened = true;
        },
        handleInfoWindowClose(){
             this.activeResturant = {};
             this.infoWindowOpened = false;
        },
        handleMapClick(e){
            this.resturants.push({
                name: 'Deicious Burgers',
                city: 'Ikeja',
                state: 'Lagos',
                hours: '8:00am-7:00pm',
                latitude: e.latLng.lat(),
                longitude: e.latLng.lng(),
            });
        }
    },

    computed: {
        mapCenter(){
            if(!this.resturants.length){
                return{
                    lat: 10,
                    lng: 10
                }
            }
            return{
                lat: parseFloat(this.resturants[0].latitude),
                lng: parseFloat(this.resturants[0].longitude)
            }
        },


        infoWindowPosition(){
            return{

                lat: parseFloat(this.activeResturant.latitude),
                lng: parseFloat(this.activeResturant.longitude)
            }
        },
    }
});
