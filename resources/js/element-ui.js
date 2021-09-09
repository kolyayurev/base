
import { 
    Form,FormItem,Select,Option,Input,Button,Rate,
    Dialog,
    MessageBox,Loading,Notification } from 'element-ui';

// import '../sass/element-ui.scss';

Vue.use(Form)
Vue.use(FormItem)
Vue.use(Select)
Vue.use(Option)
Vue.use(Input)
Vue.use(Button)
Vue.use(Rate)
Vue.use(Dialog)
Vue.use(Loading.directive);
Vue.prototype.$msgbox = MessageBox;
Vue.prototype.$alert = MessageBox.alert;
Vue.prototype.$confirm = MessageBox.confirm;
Vue.prototype.$prompt = MessageBox.prompt;
Vue.prototype.$loading = Loading.service;
Vue.prototype.$notify = Notification
