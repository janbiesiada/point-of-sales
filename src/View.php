<?php

declare(strict_types=1);

namespace JBdev\PointOfSale;

class View
{
    /**
     * @param $file
     * @param $args
     * @return string|null
     */
    public function generate($file, $args ): ?string
    {
        if ( !file_exists( $file ) ) {
            return '';
        }
        if ( is_array( $args ) ){
            extract( $args );
        }
        ob_start();
        include $file;
        $html =  ob_get_clean();
        return $html??null;
    }
}