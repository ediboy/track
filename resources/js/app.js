import './bootstrap';

import Vue from 'vue';

import VueRouter from 'vue-router';

import routes from './routes';

import Datetime from 'vue-datetime';

import 'vue-datetime/dist/vue-datetime.css';

import Croppa from 'vue-croppa';

import Response from './response';

import ConfirmDeletion from './confirm-deletion';

Vue.use(VueRouter);

Vue.use(Datetime);

Vue.use(Croppa);

Vue.mixin(Response);

Vue.mixin(ConfirmDeletion);

Vue.mixin({
    methods: {
        $pluck(array, key) {
			return array.map(function(item) {
				return item[key];
			});
		},

        $sortyByName(a, b) {
			if (a.name < b.name)
				return -1;
			if (a.name > b.name)
				return 1;
			return 0;
		},

        $sortyByTitle(a, b) {
			if (a.title < b.title)
				return -1;
			if (a.title > b.title)
				return 1;
			return 0;
		}
    }
})

let app = new Vue({

    el: '#app',

    router: new VueRouter(routes),

});
