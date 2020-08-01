module.exports = {
  styles: {
    files: [
      'src/scss/**/*.scss',
      '../src/packages/<%= package.typo3ExtName %>/**/*.scss'
    ],
    tasks: ['styles']
  },
  scripts: {
    files: [
      'src/javascript/*.js',
      'src/javascript/**/*.js',
      '../src/packages/lmr*/**/Private/*.js',
      '../src/packages/lmr*/**/Private/**/*.js'
    ],
    tasks: ['scripts']
  },
  cache: {
    files: [
      '../src/packages/<%= package.typo3ExtName %>/**/constants.txt',
      '../src/packages/<%= package.typo3ExtName %>/**/setup.txt',
      '../src/packages/<%= package.typo3ExtName %>/**/*.ts',
      '../src/packages/<%= package.typo3ExtName %>/**/*.setup',
      '../src/packages/<%= package.typo3ExtName %>/**/*.constants',
      '../src/packages/<%= package.typo3ExtName %>/**/*.tsconfig',
      '../src/packages/<%= package.typo3ExtName %>/**/*.html'
    ],
    tasks: ['shell:flushcache']
  }
};
