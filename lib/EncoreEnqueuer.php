<?php

class EncoreEnqueuer {

	private $bodyClasses;

    public function __construct($bodyClasses) {
    	$this->bodyClasses = $bodyClasses;

        add_action( 'wp_enqueue_scripts' , array( $this, 'enqueue_scripts' ) );
    }

    public function enqueue_scripts() {
	    $bodyClasses = $this->bodyClasses;

	    $entryPointsJsonPath =  __DIR__ . '/../dist/entrypoints.json';
	    if( !file_exists( $entryPointsJsonPath ) ) {
		    print_r('Theme files are not built. Build them with `yarn encore dev` or `yarn encore production!' .PHP_EOL );
		    return;
	    }

	    $entrypointsJson = file_get_contents( $entryPointsJsonPath );
	    $entrypoints = (json_decode( $entrypointsJson ))->entrypoints;

	    $distFolder = get_template_directory_uri() . '/dist';
	    $jsFiles = [];
	    $cssFiles = [];


	    foreach ($entrypoints as $entrypoint => $files) {
		    if($entrypoint === 'theme' || in_array($entrypoint, $bodyClasses))
		    {
			    $jsFiles = array_merge($jsFiles, $files->js);
			    $cssFiles = array_merge($cssFiles, $files->css);
		    }
	    }

        foreach( $cssFiles as $cssFile ) {
            $styleName = basename( $cssFile, '.css' );

            wp_enqueue_style( $styleName, $distFolder . $cssFile );
        }

        foreach ($jsFiles as $jsFile ) {
            $scriptName = basename( $jsFile, '.js' );

            wp_enqueue_style( $scriptName, $distFolder . $jsFile );
        }
    }
}
