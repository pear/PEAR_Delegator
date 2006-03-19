<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This file defines the undefined method exception.
 * 
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 * 
 * @category   PEAR
 * @package    PEAR_Delegator
 * @author     Michael Witten <herrwitten@php.net>
 * @copyright  2004-2005 Michael Witten
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id$
 * @link       http://pear.php.net/package/PEAR_Delegator
 */

require_once 'Exception.php';

/**
 * This class defines the exception that is thrown when an undefined method is called.
 *
 * @author Michael Witten <herrwitten@php.net> 4100 85
 * @see http://pear.php.net/manual/
 * @package PEAR_Delegator
 */
class PEAR_Delegator_Exception_MethodUndefined extends PEAR_Delegator_Exception
{
    /**
     * Constructs a PEAR_Delegator_Exception_MethodUndefined.
     *
     * This exception is thrown when the forwarding mechanism cannot find an implementor
     * for the given method.
     *
     * @see PEAR_Delegator::__call(), PEAR_Delegator::cacheMethod()
     * @param string $method This is the undefined method.
     */
    public function __construct($method)
    {
        $backtraceArray = $this->getTrace();
        
        $file   = 'unknown file';
        $line   = 'unknown';
        
        foreach ($backtraceArray as $fileRecord) {
            $function = $fileRecord['function'];
            if (strtolower($function) == strtolower($method)) {                    
                if (array_key_exists('file', $fileRecord)) {
                    $file = $fileRecord['file'];
                    $line = $fileRecord['line'];
                }
                
                $class = $fileRecord['class'];
                
                break;
            }
        }
        
        parent::__construct("Call to undefined method $class::$function() in <b>$file</b> on line <b>$line</b>");
    }
}
?>
