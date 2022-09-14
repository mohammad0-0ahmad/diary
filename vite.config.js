import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import i18n from 'laravel-vue-i18n/vite';

export default defineConfig({
    server: {
        watch: {
            usePolling: true,
        },
    },
    css: {
        preprocessorOptions: {
          scss: {
            additionalData: `@import "resources/sass/app.scss";`
          }
        }
      },
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        i18n(),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
});
