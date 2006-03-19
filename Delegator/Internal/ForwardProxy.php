<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This file provides the ForwardProxy class.
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

/**
 * This class is a flag for the forwarding mechanism.
 * 
 * This class serves as a flag and information carrier for the forwarding
 * mechanism. It tells delegators deep in the delegate hierarchy which
 * delegator is to be taken as the caller. Note: This is an internal structure.
 * 
 * @author Michael Witten <herrwitten@php.net> 4100 85
 * @see http://pear.php.net/manual/
 * @package PEAR_Delegator
 */
class PEAR_Delegator_Internal_ForwardProxy
{
    public $_delegator;
    
    /**
     * Constructs a PEAR_Delegator_Internal_ForwardProxy.
     *
     * @param mixed $delegator The delegator that is to be regarded
     *                         as the caller of the delegated method.
     */
    public function __construct($delegator)
    {
        $this->_delegator = $delegator;
    }
    
    /**
     * Gets the delegator that is to be regarded as the initial caller.
     */
    public function getDelegator()
    {
        return $this->_delegator;
    }
}

?>
