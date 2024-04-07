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
                'text': {
                    50: '#eff4f6',
                    100: '#dfe9ec',
                    200: '#bed3da',
                    300: '#9ebdc7',
                    400: '#7da7b5',
                    500: '#5d91a2',
                    600: '#4a7482',
                    700: '#385761',
                    800: '#253a41',
                    900: '#131d20',
                    950: '#090e10',
                },
                'background': {
                    50: '#f2f2f2',
                    100: '#e6e6e6',
                    200: '#cccccc',
                    300: '#b3b3b3',
                    400: '#999999',
                    500: '#808080',
                    600: '#666666',
                    700: '#4d4d4d',
                    800: '#333333',
                    900: '#1a1a1a',
                    950: '#1c1c1c',
                },
                'primary': {
                    50: '#ebf7fa',
                    100: '#d6eff5',
                    200: '#aedeea',
                    300: '#85cee0',
                    400: '#5dbdd5',
                    500: '#34adcb',
                    600: '#2a8aa2',
                    700: '#1f687a',
                    800: '#154551',
                    900: '#0a2329',
                    950: '#051114',
                },
                'secondary': {
                    50: '#f6eff1',
                    100: '#ecdfe4',
                    200: '#dabec9',
                    300: '#c79eae',
                    400: '#b57d93',
                    500: '#a25d77',
                    600: '#824a60',
                    700: '#613848',
                    800: '#412530',
                    900: '#201318',
                    950: '#10090c',
                },
                'accent': {
                    50: '#fbf4e9',
                    100: '#f8e9d3',
                    200: '#f0d3a8',
                    300: '#e9bd7c',
                    400: '#e1a751',
                    500: '#da9225',
                    600: '#ae741e',
                    700: '#835716',
                    800: '#573a0f',
                    900: '#2c1d07',
                    950: '#160f04',
                },
            },
        },
    },

    plugins: [forms],
};
