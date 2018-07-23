import Vue from 'vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

import locale from 'element-ui/lib/locale';
import lang from 'element-ui/lib/locale/lang/en';
locale.use(lang);

import { 
	Col, 
	Dialog, 
	Input, 
	Select, 
	Row, 
	Button,
	Option, 
	Table,  
	Icon, 
	TableColumn, 
	Loading, 
	Notification, 
	Pagination, 
	Popover, 
	Switch, 
	Message, 
	Collapse,
	Radio } from 'element-ui';

Vue.use(ElementUI)
Vue.use(Button)
Vue.use(Col)
Vue.use(Dialog)
Vue.use(Input)
Vue.use(Select)
Vue.use(Option)
Vue.use(Row)
Vue.use(Table)
Vue.use(Icon)
Vue.use(TableColumn)
Vue.use(Pagination)
Vue.use(Popover)
Vue.use(Switch)
Vue.use(Radio)

import App from './AdminApp';

new Vue({
	el: "#ninja_wp_gdpr",
	render: h => h(App)
})

console.log('Js rendered successfully');