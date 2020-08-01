module.exports = {
	options: {
		force: true
	},
	favicons: [
        '../extensions/<%= package.typo3ExtName %>/Resources/Private/Templates/Generated/Favicons.html',
        '../extensions/<%= package.typo3ExtName %>/Resources/Public/Images/Favicons/**/*'
	]
};
