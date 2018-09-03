
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import toasterPlugin from 'v-toaster-evolution'
import 'v-toaster-evolution/dist/v-toaster-evolution.css'

import VeeValidate, { Validator } from 'vee-validate'
import es from './utilities/locate/vee-validate/es'
Validator.localize('es', es)

const config = {
  errorBagName: 'errors', // change if property conflicts
  fieldsBagName: 'fields',
  delay: 0,
  locale: 'es',
  dictionary: null,
  strict: true,
  classes: false,
  classNames: {
    touched: 'touched', // the control has been blurred
    untouched: 'untouched', // the control hasn't been blurred
    valid: 'valid', // model is valid
    invalid: 'invalid', // model is invalid
    pristine: 'pristine', // control has not been interacted with
    dirty: 'dirty' // control has been interacted with
  },
  events: 'input|blur',
  inject: true,
  validity: false,
  aria: true
};

Vue.use(VeeValidate, config);
Vue.use(toasterPlugin,{timeout:10000})

Vue.component('register', require('./components/Register.vue'));

const app = new Vue({
    el: '#app'
});
