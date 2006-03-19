<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This file defines the undefined delegate exception.
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
 * This class defines the exception that is thrown when an undefined class delegate is referenced.
 *
 * @author Michael Witten <herrwitten@php.net> 4100 85
 * @see http://pear.php.net/manual/
 * @package PEAR_Delegator
 */
class PEAR_Delegator_Exception_DelegateUndefined extends PEAR_Delegator_Exception
{
    /**
     * Constructs a PEAR_Delegator_Exception_DelegateUndefined.
     *
     * This exception is thrown when adding a static delegate that has not been defined
     *
     * @see PEAR_Delegator::addDelegate()
     * @param mixed  $delegate  This is the undefined delegate. It can be a string.
     * @param string $method    The offending method.
     */
    public function __construct($delegate, $func = 'addDelegate')
    {        
        $backtraceArray = $this->getTrace();
        
        $file   = 'unknown file';
        $line   = 'unknown';
        
        foreach ($backtraceArray as $index => $fileRecord) {
            $function = $fileRecord['function'];
            if (strtolower($function) == strtolower($func)) {                    
                if (array_key_exists('file', $fileRecord)) {
                    $file = $backtraceArray[++$index]['file'];
                    $line = $backtraceArray[$index]['line'];
                }
                
                $class = $fileRecord['class'];
                
                break;
            }
        }
        
        parent::__construct("Class '$delegate' not found in <b>$file</b> on line <b>$line</b>");
    }
}
?>
