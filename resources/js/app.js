import './bootstrap';
import { createApp } from 'vue';

import axios from 'axios';
import VueAxios from 'vue-axios';
/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
@@ -16,7 +17,10 @@ import { createApp } from 'vue';
const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import MyRepo from './MyRepo.vue';

app.component('example-component', ExampleComponent);
app.component('myrepo', MyRepo);

/**
 * The following block of code may be used to automatically register your
@@ -35,5 +39,5 @@ app.component('example-component', ExampleComponent);
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.use(VueAxios, axios);
app.mount('#app');
