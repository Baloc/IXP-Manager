<?php
/**
 * OSS Framework
 *
 * This file is part of the "OSS Framework" - a library of tools, utilities and
 * extensions to the Zend Framework V1.x used for PHP application development.
 *
 * Copyright (c) 2007 - 2012, Open Source Solutions Limited, Dublin, Ireland
 * All rights reserved.
 *
 * Open Source Solutions Limited is a company registered in Dublin,
 * Ireland with the Companies Registration Office (#438231). We
 * trade as Open Solutions with registered business name (#329120).
 *
 * Contact: Barry O'Donovan - info (at) opensolutions (dot) ie
 *          http://www.opensolutions.ie/
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 *
 * It is also available through the world-wide-web at this URL:
 *     http://www.opensolutions.ie/licenses/new-bsd
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@opensolutions.ie so we can send you a copy immediately.
 *
 * @category   OSS
 * @package    OSS_Filter
 * @copyright  Copyright (c) 2007 - 2012, Open Source Solutions Limited, Dublin, Ireland
 * @license    http://www.opensolutions.ie/licenses/new-bsd New BSD License
 * @link       http://www.opensolutions.ie/ Open Source Solutions Limited
 * @author     Barry O'Donovan <barry@opensolutions.ie>
 * @author     The Skilled Team of PHP Developers at Open Solutions <info@opensolutions.ie>
 */

/**
 * @category   OSS
 * @package    OSS_Filter
 * @copyright  Copyright (c) 2007 - 2012, Open Source Solutions Limited, Dublin, Ireland
 * @license    http://www.opensolutions.ie/licenses/new-bsd New BSD License
 */
class OSS_Filter_FixLastname implements Zend_Filter_Interface
{

    /**
     * Fix the formatting of a person's lastname.
     *
     * @param string $value The value to filter
     * @return string
     */
    public function filter($value)
    {
        if( $value == '' )
            return $value;

        foreach( preg_split( "/[ \-]/", mb_strtolower( $value ) ) as $vOneName )
            $value = OSS_String::mb_str_replace( $vOneName, OSS_String::mb_ucfirst( $vOneName ), $value );

        if( mb_strpos( mb_strtoupper( $value ), "O'" ) !== false )
        {
            preg_match( "/O\'./", $value, $vMatches );
            $value = OSS_String::mb_str_replace( $vMatches[0], mb_strtoupper( $vMatches[0] ), $value );
        }

        return $value;
    }

}
