import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors');
import daisyui from "daisyui";

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
                roboto: ['Roboto', 'sans-serif'],
                anton: ['Anton', 'sans-serif'],
            },
            boxShadow: {
                'calendar': '0 1px 0 #bdbdbd, 0 2px 0 #fff, 0 3px 0 #bdbdbd, 0 4px 0 #fff, 0 5px 0 #bdbdbd, 0 0 0 1px #bdbdbd',
            },
            keyframes: {
                scale: {
                  '0%, 100%': { transform: 'scale(1)' },
                  '50%': { transform: 'scale(1.1)' },
                },
              },
              animation: {
                'scale-up-down': 'scale 2s infinite',
              },
        },
        keyframes: {
            bounceHorizontal: {
                '0%, 100%': {
                    transform: 'translateX(-25%)',
                    'animation-timing-function': 'cubic-bezier(0.8, 0, 1, 1)',
                },
                '50%': {
                    transform: 'translateX(0)',
                    'animation-timing-function': 'cubic-bezier(0, 0, 0.2, 1)',
                },
            },
        },
        animation: {
            bounceHorizontal: 'bounceHorizontal 1s infinite',
        },
        colors: {
            red: colors.red,
            black: colors.black,
            slate: colors.slate,
            white: colors.white,
            green: colors.green,
            yellow: {
                100: '#FEF3C7',
                200: '#FDE68A',
                300: '#FCD34D',
                400: '#FBBF24',
                500: '#F59E0B',
                600: '#D97706',
                700: '#B45309',
                800: '#9A3C00',
                900: '#7F2E00',
            },
            purple: {
                100: '#E9D5FF',
                200: '#D8B4FE',
                300: '#C084FC',
                400: '#A855F7',
                500: '#9333EA',
                600: '#7E22CE',
                700: '#6B21A8',
                800: '#581C87',
                900: '#4C1D6D',
            },
            green: {
                100: '#D1FAE5',
                200: '#A7F3D0',
                300: '#6EE7B7',
                400: '#34D399',
                500: '#10B981',
                600: '#059669',
                700: '#047857',
                800: '#065F46',
                900: '#064E34',
            },
            orange: {
                100: '#FFEDD5',
                200: '#FED7AA',
                300: '#FDBA74',
                400: '#FB923C',
                500: '#F97316',
                600: '#EA580C',
                700: '#C2410C',
                800: '#9A2E1D',
                900: '#7C1D1D',
            },
            blue: {
                '50': '#f0f8ff',
                '100': '#dff0ff',
                '200': '#b9e2fe',
                '300': '#7bcdfe',
                '400': '#34b4fc',
                '500': '#0a9bed',
                '600': '#007acb',
                '700': '#006cb6',
                '800': '#055387',
                '900': '#0a4570',
                '950': '#072c4a',
            },
            teal: colors.teal,
            cyan: colors.cyan,
            lime: colors.lime,
            rose: colors.rose,
            amber: colors.amber,
            gray: colors.neutral,
            transparent: 'transparent',
            screens: {
                'md': '1768px',
                'lg': '1024px',
                'xl': '1280px',
                '2xl': '1536px',
            },
        }
    },

    plugins: [
        forms,
        daisyui,
        require('tailwind-scrollbar-hide')
    ],
};
