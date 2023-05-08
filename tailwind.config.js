const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#2A669F',
                    '50': '#E4F7F8',
                    '100': '#CCEEF2',
                    '200': '#9CD7E5',
                    '300': '#6CB9D8',
                    '400': '#3B94CB',
                    '500': '#2A669F',
                    '600': '#234B83',
                    '700': '#1B3366',
                    '800': '#14204A',
                    '900': '#0C102E'
                },

                second: {
                    DEFAULT: '#9F2A2A',
                    '50': '#F8EBE4',
                    '100': '#F2D7CC',
                    '200': '#E5AC9C',
                    '300': '#D87B6C',
                    '400': '#CB463B',
                    '500': '#9F2A2A',
                    '600': '#83232A',
                    '700': '#661B26',
                    '800': '#4A1420',
                    '900': '#2E0C16'
                },
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};