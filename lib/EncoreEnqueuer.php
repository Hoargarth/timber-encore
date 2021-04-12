<?php

class EncoreEnqueuer {

	private $bodyClasses;

    public function __construct($bodyClasses) {
    	$this->bodyClasses = $bodyClasses;

        add_action( 'wp_enqueue_scripts' , array( $this, 'enqueue_scripts' ) );
    }

    public function enqueue_scripts() {
    	$bodyClasses = $this->bodyClasses;
        $entrypointsJson = file_get_contents( __DIR__ . '/../dist/entrypoints.json' );
        $entrypoints = (json_decode( $entrypointsJson ))->entrypoints;
	    $distFolder = get_template_directory_uri() . '/dist';
	    $jsFiles = [];
        $cssFiles = [];


        foreach ($entrypoints as $entrypoint => $files) {
        	if($entrypoint === 'theme' || in_array($entrypoint, $bodyClasses))
	        {
	        	print_r($entrypoint);
	        }
        }

        // global theme files to be enqueued
//        $jsFiles = array_merge($jsFiles, $entrypoints->entrypoints->theme->js);
//        $cssFiles = array_merge($cssFiles, $entrypoints->entrypoints->theme->css);



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
