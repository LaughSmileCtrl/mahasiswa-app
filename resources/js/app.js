require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

import '@fortawesome/fontawesome-free/css/all.min.css';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const options = {
    confirmButtonColor: '#EF4444',
  };


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

var theme = 'cmyk';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(VueSweetalert2, options)
            .mixin({ 
                methods: { route },
                data() {
                    return {
                        theme,
                    }
                }
             })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
