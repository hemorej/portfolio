module.exports = function (grunt) {
 
    grunt.initConfig({
        crawl: {
            live: {
              options: {
                baseUrl: "http://localhost:8888/perso/",
                content: false,
                depth: 4,
                viewportWidth: 1280,
                viewportHeight: 1024,
                waitDelay: 10000,
                sitemap: true,
                sitemapDir: '/tmp',
                exclude: ['resume.pdf']
                }
            }
        },
        convert: {
            options: {
              explicitArray: false,
            },
            xml2json: {
                files: [
                  {
                    expand: true,
                    cwd: '/tmp',
                    src: ['sitemap.xml'],
                    dest: '/tmp',
                    ext: '.json'
                  }
                ]
            },
        },
        uncss: {
          dist: {
            options: {
              ignore: ['.error', '.error p', '.error a', '.error .contain-to-grid']
            }
          },
      },
      cssmin: {
        dist: {
            files: [
            { src: 'assets/css/tidy.css', dest: 'assets/css/tidy.css' }
            ]
        }
    }
    });
 
    // Load the plugins
    grunt.loadNpmTasks('grunt-uncss');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-crawl');
    grunt.loadNpmTasks('grunt-convert');
 
    // Default tasks.
    grunt.registerTask('sitemap', ['crawl', 'convert']);
    grunt.registerTask('default', ['load_sitemap', 'uncss', 'cssmin']);
    grunt.registerTask('load_sitemap', function() {
        var sitemap = grunt.file.readJSON('/tmp/sitemap.json');
        var urls = [];
        sitemap.urlset.url.forEach(function(each){
            urls.push(each.loc);
        });
        grunt.config.set('uncss.dist.files', {'assets/css/tidy.css' : urls});
    });
 
};