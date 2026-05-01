import "./bootstrap.ts";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import DashboardLayout from "./pages/layout/DashboardLayout.vue";
import { Icon } from "@iconify/vue";

const capitalize = (str: string) =>
    str
        .split(" ")
        .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
        .join(" ");

createInertiaApp({
    resolve: async (name) => {
        const page = await resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob("./pages/**/*.vue"),
        );

        page.default.layout ??= name.startsWith("auth/") ? undefined : DashboardLayout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .provide("capitalize", capitalize)
            .component("Icon", Icon);
        app.config.globalProperties.$capitalize = capitalize;
        app.mount(el);
    },
});
