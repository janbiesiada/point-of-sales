<?php

declare(strict_types=1);


namespace JBdev\PointOfSale;


class View
{
    public function generate( $file, $args ){
        // ensure the file exists
        if ( !file_exists( $file ) ) {
            return '';
        }
        if ( is_array( $args ) ){
            extract( $args );
        }
        ob_start();
        include $file;
        return ob_get_clean();
    }

}