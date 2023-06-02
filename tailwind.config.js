const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        screens: {
            'xs': '480px',
            // => @media (min-width: 540px) { ... }

            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'll': '850px',
            // => @media (min-width: 868px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            'xl1': '1400px',
            // => @media (min-width: 1400px) { ... }

            '1500': '1500px',
            // => @media (min-width: 1500px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }

            '1700': '1700px',
            // => @media (min-width: 1700px) { ... }

            '1800': '1800px',
            // => @media (min-width: 1800px) { ... }
        }

    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
