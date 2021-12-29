module.exports = {
  styles: {
    files: [
      'src/scss/**/*.scss',
      '../extensions/<%= package.typo3ExtName %>/**/*.scss'
    ],
    tasks: ['styles']
  },
  scripts: {
    files: [
      'src/javascript/*.js',
      'src/javascript/**/*.js',
      '../extensions/lmr*/**/Private/*.js',
      '../extensions/lmr*/**/Private/**/*.js'
    ],
    tasks: ['scripts']
  },
  cache: {
    files: [
      '../extensions/<%= package.typo3ExtName %>/**/constants.txt',
      '../extensions/<%= package.typo3ExtName %>/**/setup.txt',
      '../extensions/<%= package.typo3ExtName %>/**/*.ts',
      '../extensions/<%= package.typo3ExtName %>/**/*.setup',
      '../extensions/<%= package.typo3ExtName %>/**/*.constants',
      '../extensions/<%= package.typo3ExtName %>/**/*.tsconfig',
      '../extensions/<%= package.typo3ExtName %>/**/*.html'
    ],
    tasks: ['shell:flushcache']
  }
};
