import Vue from 'vue'

import locale from 'element-ui/lib/locale';
import lang from 'element-ui/lib/locale/lang/en';
locale.use(lang);

import { 
	Col, 
	Input, 
	Select, 
	Row, 
	Button,
	Option, 
	Icon, 
	Loading, 
	Notification, 
	Switch, 
	Message, 
	Collapse,
	CollapseItem,
	Radio,
	RadioGroup,
	ColorPicker
} from 'element-ui'

Vue.use(Button)
Vue.use(Col)
Vue.use(Input)
Vue.use(Select)
Vue.use(Option)
Vue.use(Row)
Vue.use(Icon)
Vue.use(Switch)
Vue.use(Radio)
Vue.use(Message);
Vue.use(Collapse);
Vue.use(CollapseItem);
Vue.use(RadioGroup);
Vue.use(ColorPicker);


Vue.prototype.$notify = Notification;

import 'element-ui/lib/theme-chalk/notification.css';
import 'element-ui/lib/theme-chalk/loading.css';
import 'element-ui/lib/theme-chalk/button.css';
import 'element-ui/lib/theme-chalk/col.css';
import 'element-ui/lib/theme-chalk/dialog.css';
import 'element-ui/lib/theme-chalk/input.css';
import 'element-ui/lib/theme-chalk/select.css';
import 'element-ui/lib/theme-chalk/option.css';
import 'element-ui/lib/theme-chalk/row.css';
import 'element-ui/lib/theme-chalk/table.css';
import 'element-ui/lib/theme-chalk/collapse.css';
import 'element-ui/lib/theme-chalk/collapse-item.css';
import 'element-ui/lib/theme-chalk/color-picker.css';
import 'element-ui/lib/theme-chalk/switch.css';


import App from './AdminApp';

new Vue({
	el: "#ninja_wp_gdpr",
	render: h => h(App)
})
