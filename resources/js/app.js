require('./bootstrap');
import Vue from 'vue'
import '@progress/kendo-ui'
import { Grid, GridInstaller } from '@progress/kendo-grid-vue-wrapper'
import { DataSource, DataSourceInstaller } from '@progress/kendo-datasource-vue-wrapper'

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
