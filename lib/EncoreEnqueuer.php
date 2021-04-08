<?php

class EncoreEnqueuer {

    public function __construct() {
        add_action( 'wp_enqueue_scripts' , array( $this, 'enqueue_scripts' ) );
    }

    public function enqueue_scripts() {
        $entrypointsJson = file_get_contents( __DIR__ . '/../dist/entrypoints.json' );
        $entrypoints = json_decode( $entrypointsJson );

        $jsFiles = $entrypoints->entrypoints->theme->js;
        $cssFiles = $entrypoints->entrypoints->theme->css;

        $distFolder = get_template_directory_uri() . '/dist';

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