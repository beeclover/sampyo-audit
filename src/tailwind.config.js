const defaultTheme = require('tailwindcss/defaultTheme');

const colorReset = {
  color: null,
};

const colors = {
  lochmara: {
    50: '#f2f9fd',
    100: '#e6f3fa',
    200: '#bfe1f3',
    300: '#99cfeb',
    400: '#4daadd',
    500: '#0086ce',
    600: '#0079b9',
    700: '#00659b',
    800: '#00507c',
    900: '#004265',
  },
  mineShaft: {
    50: '#f5f5f5',
    100: '#ebebeb',
    200: '#cccccc',
    300: '#adadad',
    400: '#707070',
    500: '#333333',
    600: '#2e2e2e',
    700: '#262626',
    800: '#1f1f1f',
    900: '#191919',
  },
};

module.exports = {
  mode: 'jit',
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    container: {
      center: true,
      padding: 'var(--container-px)',
    },
    extend: {
      colors,
      fontFamily: {
        sans: ['"Noto Sans KR"', ...defaultTheme.fontFamily.sans],
      },
      typography: {
        DEFAULT: {
          css: {
            maxWidth: null,
            color: null,
            a: {
              color: null,
              '&:hover': colorReset,
            },
            strong: colorReset,
            string: colorReset,
            h1: colorReset,
            h2: colorReset,
            h3: colorReset,
            h4: colorReset,
            h5: colorReset,
            h6: colorReset,
            pre: null,
            code: null,
            'code::after': null,
            'code::before': null,
            'pre code': null,
          },
        },
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/line-clamp'),
  ],
};
