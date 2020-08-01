module.exports = {
	options: {
		force: true
	},
	favicons: [
        '../src/packages/<%= package.typo3ExtName %>/Resources/Private/Templates/Generated/Favicons.html',
        '../src/packages/<%= package.typo3ExtName %>/Resources/Public/Images/Favicons/**/*'
	]
};
