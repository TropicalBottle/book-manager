import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'text': '#1d0401',
                'background': '#fff4f4',
                'primary': '#ff6251',
                'secondary': '#fcd978',
                'accent': '#faf04f',
                'd-text': '#fbfce9',
                'd-background': '#1b1f1f',
                'd-primary': '#c8d11a',
                'd-secondary': '#0f7b6c',
                'd-accent': '#156bac',
            },
        },
    },

    plugins: [forms],
};
