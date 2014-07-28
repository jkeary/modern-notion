module.exports = function(grunt) {

  // load all grunt tasks matching the `grunt-*` pattern
  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: 'library/js/plugins/*.js',
        dest: 'library/js/plugins.min.js'
      }
    },

    watch: {
      styles: {
        files: ["./library/css/*.css", './homepage.php'],
        options: {
          livereload: 1337
        }
      }
    },

    sass: {
      dev: {
        options: {
          style: "expanded"
        }, 
        files: {
          "./library/css/style.css": "./library/scss/style.scss"
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.registerTask('default', ['uglify', 'sass:dev']);

};