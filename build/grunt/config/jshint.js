module.exports = {
	options: {
		curly: true,
		eqeqeq: true,
		eqnull: true,
		browser: true,
		globals: {
			jQuery: true,
			$: true,
			console: true
		}
	},
	dist: [
		'src/javascript/*.js',
		'src/javascript/**/*.js',
		'../src/packages/lmr*/**/Private/*.js',
		'../src/packages/lmr*/**/Private/**/*.js'
	]
};
