module.exports = function(grunt){
	
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),	
		
		/**
		 * Lint JS
		 */
        jshint: {
            all: ['Gruntfile.js', 'js/*.js', '!js/*.min.js'],
            options: {
                globals: {
                    jQuery: true
                }
            }
        },
		
		/**
		 * Sass tasks
		 */
		 sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				files: {
					'./style.css' : 'sass/style.scss'
				}	
			}	 
		 },
		 
		 /**
		 * Autoprefixer
		 */
		 postcss: {
			options: {
				map: true,
				    processors: [
				      require('autoprefixer')()
				    ]
			},
			// prefix all css files in the project root
			dist: {
				src: './*.css'
			}	 
		 },
		
		/**
		 * Watch task
		 */
		 watch: {
			grunt: {
				files: ['Gruntfile.js'],
				options: {
					reload: true
				}
			},
			css: {
				files: ['./sass/**/*.scss'],
				tasks: ['sass', 'postcss']
			},
			js: {
				files: ['js/**/*.js', '!node_modules/*'],
				tasks: ['jshint']
			} 
		 }
	});
	
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('@lodder/grunt-postcss');
	grunt.registerTask('default',['watch']);
};