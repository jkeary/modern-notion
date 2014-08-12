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
        files: ["./library/css/*.css", './homepage.php', "./library/js/scripts.js"],
        options: {
          livereload: 1337
        }
      },
      plugins: {
        files: ["./library/js/plugins/modern.stick.js"],
        tasks: ["uglify"],
        options: {
          livereload: 1337
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['uglify']);

};