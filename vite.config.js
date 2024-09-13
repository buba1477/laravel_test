import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue"; //add this line
import laravel from "laravel-vite-plugin";
import path from "path";
export default defineConfig({
    plugins: [
        vue(), // write this
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
             vue: "vue/dist/vue.esm-bundler.js",
            '@': path.resolve(__dirname, "resources"),
        },
    },

});
