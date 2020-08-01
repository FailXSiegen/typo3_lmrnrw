module.exports = {
	options: {
		processors: [
      require('autoprefixer')(),
      require('cssnano')()
		]
	},
	dist: {
		src: '../src/packages/<%= package.typo3ExtName %>/Resources/Public/Stylesheets/*.css'
	}
};
