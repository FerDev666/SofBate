require('./bootstrap');
import Vue from 'vue'
import '@progress/kendo-ui'
import { Grid, GridInstaller } from '@progress/kendo-grid-vue-wrapper'
import { DataSource, DataSourceInstaller } from '@progress/kendo-datasource-vue-wrapper'
import '@progress/kendo-ui/js/messages/kendo.messages.es-BO.min.js'
import '@progress/kendo-ui/js/cultures/kendo.culture.es-BO.min.js'

kendo.culture("es-BO");

Vue.use(GridInstaller)
Vue.use(DataSourceInstaller)

Vue.component('grid-component', require('./components/GridComponent.vue').default);


const app = new Vue({
    el: '#app',
    components: {
   	   DataSource,
       Grid
    }
});
