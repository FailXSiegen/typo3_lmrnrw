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
		'../extensions/lmr*/**/Private/*.js',
		'../extensions/lmr*/**/Private/**/*.js'
	]
};
