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
            resturants: []
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
        }
    }
});
