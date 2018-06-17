
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('site', require('./components/Site'))
Vue.component('loader', require('./components/Loader'))

const app = new Vue({
    el: '#app',
    data() {
    	return {
    		sites: [],
    		loaded: false,
    		gifForLoader: ''
    	}
    },
    methods: {
    	getGif() {
    		let self = this

    		window.axios.get('/gif')
    		.then((response) => {
    			self.gifForLoader = response.data
    		})
    	},
    	getPings() {

    		this.getGif()

    		this.loaded = false

    		let self = this

    		window.axios.get('/ping')
    		.then((response) => {
    			self.sites = response.data
    			self.loaded = true
    		})

    	},
    	addSite() {
    		
    		let self = this

    		let site = document.getElementById('newSite').value

    		window.axios.post('/add', {
    			url: site
    		})
    		.then((response) => {
    			self.getPings()
    		})
    	}
    },
    mounted() {
    	this.getGif()
    	this.getPings()

        let self = this
        setInterval(function() {
            self.getPings()
        }, 60000)
    }
});
