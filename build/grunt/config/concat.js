module.exports = {
  globalVendorScripts: {
    src: [
    	'node_modules/jquery/dist/jquery.min.js',
		'node_modules/jrespond/js/jRespond.min.js',
		'node_modules/jquery.cookie/jquery.cookie.js',
		'node_modules/slick-carousel/slick/slick.min.js',
		'node_modules/svg-injector/dist/svg-injector.min.js'
    ],
    dest: '../extensions/<%= package.typo3ExtName %>/Resources/Public/Scripts/Vendor.js'
  },
  scripts: {
    src: [
      'src/javascript/**/*.js',
      '../extensions/<%= package.typo3ExtName %>/Subpackages/**/Private/**/*.js'
    ],
    dest: '../extensions/<%= package.typo3ExtName %>/Resources/Public/Scripts/Scripts.js'
  }
};
