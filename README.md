#WPx

___
###Wordpress Experimental Start Template based in


* [H5BP](https://github.com/h5bp/html5-boilerplate)
* [Bones](https://github.com/eddiemachado/bones)
* [Gulp.js](http://gulpjs.com/)
* [SCSS](http://sass-lang.com/)
* [valendesigns/option-tree](https://github.com/valendesigns/option-tree)
* [rilwis/meta-box](https://github.com/rilwis/meta-box)
___
####After Clone

Clone lates version of

* [valendesigns/option-tree](https://github.com/valendesigns/option-tree)
* [rilwis/meta-box](https://github.com/rilwis/meta-box)

clone it to:

`
assets/themes/my-theme-2/inc/plugins/
`

___
####Then our theme need NPM dependencies for GULP (remember `sudo` if you have not root privilages):

```
  npm install gulp gulp-util gulp-ruby-sass gulp-compass gulp-autoprefixer gulp-minify-css gulp-jshint gulp-uglify gulp-imagemin gulp-rename gulp-rimraf gulp-concat gulp-notify gulp-cache gulp-plumber gulp-livereload --save-dev
```
####And the dependencie package.json should look like:

```

 {
  "repository": {
    "type": "git",
    "url": "https://bitbucket.org/dreamsengineering/[CHANGETHE_REPOSITORY.GIT]"
  },
  "devDependencies": {
    "gulp": "^3.8.7",
    "gulp-autoprefixer": "0.0.8",
    "gulp-cache": "^0.2.0",
    "gulp-compass": "^1.2.0",
    "gulp-concat": "^2.3.4",
    "gulp-imagemin": "^0.6.2",
    "gulp-jshint": "^1.8.4",
    "gulp-livereload": "^2.1.0",
    "gulp-minify-css": "^0.3.7",
    "gulp-notify": "^1.4.1",
    "gulp-plumber": "^0.6.4",
    "gulp-rename": "^1.2.0",
    "gulp-rimraf": "^0.1.0",
    "gulp-ruby-sass": "^0.7.1",
    "gulp-uglify": "^0.3.1",
    "gulp-util": "^3.0.0"
  }
}
```
___