module.exports = {
	options: {
		processors: [
      require('autoprefixer')(),
      require('cssnano')()
		]
	},
	dist: {
		src: '../extensions/<%= package.typo3ExtName %>/Resources/Public/Stylesheets/*.css'
	}
};
