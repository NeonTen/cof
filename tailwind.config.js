module.exports = {
	content: ["**/*.{html,php,svg}", "js/custom.js", "../../**/*.php"],
	theme: {
		container: {
			center: true,
			padding: {
				DEFAULT: '1.5rem',
				lg: '2.5rem',
				'2xl': '4rem',
				'4xl': '5rem',
			},
		},
		extend: {
			colors: {
				'primary': 'var(--color-primary)',
				'secondary': 'var(--color-secondary)',
				'gray': 'var(--color-gray)',
				'dark-color': 'var(--color-dark)',
				'light-color': 'var(--color-light)',
				'border-color': 'var(--color-border)',
				'text-color': 'var(--color-text)',
			},
			screens: {
				'2xl': '1440px',
				'3xl': '1600px',
				'4xl': '1820px',
			},
			transitionProperty: {
				'height': 'height',
				'spacing': 'margin, padding',
			},
			fontFamily: {
				'handwritting': ['Meie Script', 'cursive'],
				'awesome': ['"Font Awesome 5"'],
			},
			fontSize: {
				'80': '5rem',
			},
			boxShadow: {
				'custom': '2px 2px 15px rgba(0, 0, 0, 0.08)',
			},
			borderWidth: {
				'10': '10px',
			}
		},
	},
	plugins: [
		require('@tailwindcss/forms'),
	],
}
