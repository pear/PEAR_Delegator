<HTML>
<TITLE>Show Off</TITLE>
<BODY>
<?php
    require_once "PEAR.php";
    require_once "PEAR/Delegator.php";

    echo
"
<pre>
    We will create 12 classes: 
        A
            ADelegate1
            ADelegate2
            B
                BDelegate1
                BDelegate2.
        Extra1
        Extra2
        Traditional
            Delegate
            DelegateFalse
            DelegateMixed;
    
    They are defined as follows:
    
    class A extends PEAR_Delegator
    {
        var \$message;
        
        public function __construct()
        {
            parent::__construct();
            
            \$this->addDelegate('ADelegate1');
            \$this->addDelegate('ADelegate2');
            \$this->addDelegate(new B);
        }
        
        public function __destruct()
        {
            parent::__destruct();
        }
    }
    
    class ADelegate1 extends PEAR
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function setMessage1(\$owner, \$message)
        {
            \$owner->message = \$message;
        }
    }
    
    class ADelegate2 extends PEAR
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function getMessage1(\$owner)
        {
            echo \$owner->message;
        }
    }
    
    class B extends PEAR_Delegator
    {
        public function __construct()
        {
            parent::__construct();
            
            \$this->addDelegate('BDelegate1');
            \$this->addDelegate(new BDelegate2);
        }
        
        public function __destruct()
        {
            parent::__destruct();
        }
        
        function foo()
        {
            echo get_class(\$this) . \": I will now call my foo delegate without knowing which one it is< BR>\";
            
            \$args = func_get_args();
            
            \$this->forwardMethod(\"foo\", \$args);
        }
        
        function bar()
        {
            echo get_class(\$this) . \": I will now call my bar delegate without knowing which one it is< BR>\";
            
            \$args = func_get_args();
            
            \$this->forwardMethod(\"bar\", \$args);
        }
                
        public function setMessage2(\$owner, \$message)
        {
            \$this->message = \$message;
        }
        
        public function getMessage2()
        {
            echo \$this->message;
        }
    }
    
    class BDelegate1 extends PEAR
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function foo()
        {
            echo \"BDelegate1:\" . \": foo< BR>\";
        }
    }
    
    class BDelegate2 extends PEAR
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function bar()
        {
            echo \"BDelegate2\" . \": bar< BR>\";
        }
    }
    
    class Extra1 extends PEAR_Delegator
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function __destruct()
        {
            parent::__destruct();
        }
        
        public function awesome1()
        {
            echo \"Isn't this Awesome!\";
        }
    }
    
    class Extra2
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function awesome2()
        {
            echo \"Really, isn't this Awesome!\";
        }
    }
    
    class Traditional extends PEAR_Delegator
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function __destruct()
        {
            parent::__destruct();
        }
        
        public function showList()
        {
            \$args = func_get_args();
            
            if (\$this->hasDelegate())
            {
                return \$this->forwardMethod(\"showList\", \$args);
            }
            
            echo \$args[0];
            
            unset(\$args[0]);
            
            foreach (\$args as \$arg)
            {
                echo \", \$arg\";
            }
        }
    }
    
    class Delegate
    {
        var \$_multiplier;
        
        public function __construct(\$number)
        {
            \$this->_multiplier = \$number;
        }
        
        public function __destruct()
        {
        }
        
        public function showList(\$owner)
        {
            \$args = func_get_args();
            
            echo \$args[1] * \$this->_multiplier;
            
            unset(\$args[0]);
            unset(\$args[1]);
            
            foreach (\$args as \$arg)
            {
                echo \", \" . \$arg * \$this->_multiplier;
            }
        }
    }
    
    class DelegateFalse
    {
        public function showListFalse(\$multiplier)
        {
            \$args = func_get_args();
            
            echo \$args[1] * \$multiplier;
            
            unset(\$args[0]);
            unset(\$args[1]);
            
            foreach (\$args as \$arg)
            {
                echo ", " . \$arg * \$multiplier;
            }
        }
    }
    
    class DelegateMixed extends PEAR_Delegator
    {
        public function __construct()
        {            
            \$this->addDelegate(false, 'DelegateFalse');
        }
        
        public function showList(\$owner)
        {
            echo \"My owner, \$owner, says \\\"Show the list!\\\" But I don't want to show no stinking list!\";
        }
    }
</pre>
";

    class A extends PEAR_Delegator
    {
        var $message;
        
        public function __construct()
        {
            parent::__construct();
            
            $this->addDelegate('ADelegate1');
            $this->addDelegate('ADelegate2');
            $this->addDelegate(new B);
        }
        
        public function __destruct()
        {
            parent::__destruct();
        }
    }
    
    class ADelegate1 extends PEAR
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function setMessage1($owner, $message)
        {
            $owner->message = $message;
        }
    }
    
    class ADelegate2 extends PEAR
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function getMessage1($owner)
        {
            echo $owner->message;
        }
    }
    
    class B extends PEAR_Delegator
    {
        public function __construct()
        {
            parent::__construct();
            
            $this->addDelegate('BDelegate1');
            $this->addDelegate(new BDelegate2);
        }
        
        public function __destruct()
        {
            parent::__destruct();
        }
        
        function foo()
        {
            echo get_class($this) . ": I will now call my foo delegate without knowing which one it is<BR>";
            
            $args = func_get_args();
            
            $this->forwardMethod("foo", $args);
        }
        
        function bar()
        {
            echo get_class($this) . ": I will now call my bar delegate without knowing which one it is<BR>";
            
            $args = func_get_args();
            
            $this->forwardMethod("bar", $args);
        }
                
        public function setMessage2($owner, $message)
        {
            $this->message = $message;
        }
        
        public function getMessage2()
        {
            echo $this->message;
        }
    }
    
    class BDelegate1 extends PEAR
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function foo()
        {
            echo "BDelegate1:" . ": foo<BR>";
        }
    }
    
    class BDelegate2 extends PEAR
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function bar()
        {
            echo "BDelegate2" . ": bar<BR>";
        }
    }
    
    class Extra1 extends PEAR_Delegator
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function __destruct()
        {
            parent::__destruct();
        }
        
        public function awesome1()
        {
            echo "Isn't this Awesome!";
        }
    }
    
    class Extra2
    {
        public function __construct()
        {
        }
        
        public function __destruct()
        {
        }
        
        public function awesome2()
        {
            echo "Really, isn't this Awesome!";
        }
    }
    
    class Traditional extends PEAR_Delegator
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function __destruct()
        {
            parent::__destruct();
        }
        
        public function showList()
        {
            $args = func_get_args();
            
            if ($this->hasDelegate())
            {
                return $this->forwardMethod("showList", $args);
            }
            
            echo $args[0];
            
            unset($args[0]);
            
            foreach ($args as $arg)
            {
                echo ", $arg";
            }
        }
    }
    
    class Delegate
    {
        var $_multiplier;
        
        public function __construct($number)
        {
            $this->_multiplier = $number;
        }
        
        public function __destruct()
        {
        }
        
        public function showList($owner)
        {
            $args = func_get_args();
            
            echo $args[1] * $this->_multiplier;
            
            unset($args[0]);
            unset($args[1]);
            
            foreach ($args as $arg)
            {
                echo ", " . $arg * $this->_multiplier;
            }
        }
    }
    
    class DelegateFalse
    {
        public function showListFalse($multiplier)
        {
            $args = func_get_args();
            
            echo $args[1] * $multiplier;
            
            unset($args[0]);
            unset($args[1]);
            
            foreach ($args as $arg)
            {
                echo ", " . $arg * $multiplier;
            }
        }
    }
    
    class DelegateMixed extends PEAR_Delegator
    {
        public function __construct()
        {            
            $this->addDelegate(false, 'DelegateFalse');
        }
        
        public function showList($owner)
        {
            echo "My owner, $owner, says \"Show the list!\" But I don't want to show no stinking list!";
        }
    }

echo
"
<PRE>
    Before we get into the really cool stuff, here is the traditional delegate model:
    
    We instantiate our Traditional class and call its showList method:
    
    \$Traditional = new Traditional;
    
    \$Traditional->showList(1, 2, 3, 4, 5);
    Output:
</PRE>
";
$Traditional = new Traditional;

$Traditional->showList(1, 2, 3, 4, 5);
echo
"
<PRE>
    Let us now augment this method with our Delegate. We instantiate the
    Delegate class:
    
    \$Delegate = new Delegate(2); //value 2 sets multiplier of list;
    
    In the traditional model, only one delegate can be used, so:
    
    \$Traditional->setDelegate(\$Delegate);  //Note, static delegates are also applicable.
    
    \$Traditional->showList(1, 2, 3, 4, 5);
    Output:
</PRE>
";
$Delegate = new Delegate(2);
$Traditional->setDelegate($Delegate);
$Traditional->showList(1, 2, 3, 4, 5);

echo
"
<PRE>
    Thus, the delegate method is called instead.
    
    
    There is also support for existing classes, called false delegates, whose methods don't
    take the delegator as their first arguments:
    \$Traditional->addDelegate(false, 'DelegateFalse');
    \$Traditional->showListFalse(3, 1, 2, 3, 4, 5);
</PRE>
";

$Traditional->addDelegate(false, 'DelegateFalse');
$Traditional->showListFalse(3, 1, 2, 3, 4, 5);

echo
"
<PRE>
    In this way, mixed false and true methods can be used.
    First, lets set the delegate to the mixed version:
    \$Traditional->setDelegate(DelegateMixed);
    \$Traditional->showListFalse(3, 1, 2, 3, 4, 5);
</PRE>
";

$Traditional->setDelegate(new DelegateMixed);
$Traditional->showListFalse(3, 1, 2, 3, 4, 5);

echo
"
<PRE>
    \$Traditional->showList(1, 2, 3, 4, 5);
</PRE>
";

$Traditional->showList(1, 2, 3, 4, 5);

echo
"
<PRE>
    
    We add the extensions so that every new delegator will have them:
    
    PEAR_Delegator::addExtensions();
    
    If this is done after objects are created, simply call
    
    PEAR_Delegator::addExtensions(\$object1, \$object2, ...);
    
    to add the delegates.
    
    We now instantiate an A object:
    
    \$A = new A;
    
    You'll note that the A class defines no useable method. Nevertheless,
    when we call \$A->setMessage1(\"Hello\"), we get no error.
    
    To prove that it worked, let's recall the message with
    
    \$A->getMessage1();
    
    Output:
</PRE>
";
    PEAR_Delegator::addExtensions();
    
    $A = new A;
    
    $A->setMessage1("Hello");
    $A->getMessage1();

echo
"
<PRE>
    Let's now set and get the second message:
    
    \$A->setMessage2(\"World\");
    \$A->getMessage2();
    
    Output:
</PRE>
";
$A->setMessage2("World");
$A->getMessage2();

echo
"
<PRE>
    You'll note that the second message is not even stored in the A object!
    
    Now, let's try some of the other methods:
    
    //This calls the method foo in B which calls the method in BDelegate1, albeit transparently.
    \$A->foo();
    Output:
</PRE>
";
$A->foo();
echo
"
<PRE>
    //This calls the method bar in B which calls the method in BDelegate2, albeit transparently.
    \$A->bar();
    Output:
</PRE>
";
$A->bar();
echo
"
<PRE>
    You'll also notice that we simply instantiated A, which added the delegates to itself
    in its constructor. This is convenient, but it is certainly not the only way to add delegates.
    In fact, delegates can be added to a delegator at any time, and with classname or object.
    Let's add another delegate to A through an object:
    
    //We add this as an object, because it needs access to instance variables. If a delegate only
    //supplies static methods, then it can be added statically (by classname), in which no object
    //is created.
    \$Extra1 = new Extra1;
    \$A->addDelegate(\$Extra1);
    
    We can now call the methods in Extra1 on the A object as follows:
    
    \$A->awesome1();
    Output:
</PRE>
";
$Extra1 = new Extra1;
$A->addDelegate($Extra1);

$A->awesome1();
echo
"
<PRE>
    Here, we add a new delegate to the Extra1 object by classname:
    
    \$Extra1->addDelegate(Extra2);
    
    Now we can use the methods in Extra2 on the A object as follows:
    
    \$A->awesome2();
    Output:
</PRE>
";
$Extra1->addDelegate(new Extra2);
$A->awesome2();
echo
"<PRE>
    Now, let's explore the features of the PEAR_Delegate class. This class deals
    solely with the method forwarding mechanism and the delegate class hierarchy.
    Thus, all of its methods reflect that function.
    
    We have demonstrated the ability to add more delegates and so on, so we will
    now sequentially go though the other methods.
    
    It is generally necessary to have access to the delegate hierarchy, so we have
    getDelegate*() methods.
    
    To view the results, we will define a few functions along the way.
    
    function print_r_ElementTypes(\$array)
    {
        foreach (\$array as \$key => \$element)
            echo \"[\$key] => \" . get_class(\$element) . \"< BR>\";
    }
    
    print_r_ElementTypes(\$A->getAllDelegates());
    Output:
</PRE>
";
function print_r_ElementTypes($array)
{
    foreach ($array as $key => $element)
        echo "[$key] => " . (is_string($element) ? $element : get_class($element)) . "<BR>";
}
print_r_ElementTypes($A->getAllDelegates());
echo
"<PRE>
    We can immediately see that this is the correct output of native delegates to the A Object.
    
    Now let's search for one particular kind of native delegate:
    
    print_r_ElementTypes(\$A->getDelegate('PEAR'));
    output:
</PRE>
";
print_r_ElementTypes($A->getDelegate('PEAR'));
echo
"<PRE>
    Or perhaps:
    
    print_r_ElementTypes(\$A->getDelegate('PEAR_Delegator'));
    output:
</PRE>
";
print_r_ElementTypes($A->getDelegate('PEAR_Delegator'));
echo
"<PRE>
    We can even search for multiple classes at a time:
    
    function print_r_ElementTypesR(\$array)
    {
        foreach (\$array as \$key => \$element)
        {
            echo \"[\$key]\\n\";
            foreach (\$element as \$delegate)
            {
                echo \"\t\" . get_class(\$delegate) . \"\\n\";
            }
        }
    }
    
    echo \"< PRE>\\n\";
    print_r_ElementTypesR(\$A->getDelegate('PEAR', 'PEAR_Delegator', 'B', 'BDelegate1'));
    echo \"< /PRE>\\n\";
    output:
</PRE>
";
function print_r_ElementTypesR($array)
{
    foreach ($array as $key => $element)
    {
        echo "[$key]\n";
        foreach ($element as $delegate)
        {
            echo "\t" . (is_string($delegate) ? $delegate : get_class($delegate)) . "\n";
        }
    }
}
echo "<PRE>\n";
print_r_ElementTypesR($A->getDelegate('PEAR', 'PEAR_Delegator', 'B', 'BDelegate1'));
echo "</PRE>\n";
echo
"<PRE>
    You'll notice that BDelegate1 returned B. This is an example of delegate subclassing.
    
    Before we continue, lets look at the structure of A:
    echo \"< PRE>\";
    print_r(\$A);
    echo \"< /PRE>\";
</PRE>
";
echo "<PRE>";
print_r($A);
echo "</PRE>";
echo
"<PRE>
    We should get the same thing even if we clone the delegator.
    \$clone = clone \$A
    echo \"< PRE>\";
    print_r(\$clone);
    echo \"< /PRE>\";
</PRE>
";
echo "<PRE>";
$clone = clone $A;
print_r($clone);
echo "</PRE>";
echo
"<PRE>
    To make this clear, lets fetch the B Delegate from both and see if they are the same object:
    \$AB     = \$A->getDelegate('B');
    \$cloneB = \$clone->getDelegate('B');
    echo (\$AB === \$cloneB) ? \"yes\" : \"no\";
    
    Output:
</PRE>
";
$AB     = $A->getDelegate('B');
$cloneB = $clone->getDelegate('B');
echo ($AB === $cloneB) ? "yes" : "no";
echo
"<PRE>
    We can do the same thing for a delegate of the exact type:
    
    echo \$A->getDelegateExact('BDelegate1');
    Output:
</PRE>
";
echo $A->getDelegateExact('BDelegate1');
echo
"<PRE>
    Nothing! There is no delegate directly of the type BDelegate1, so nothing is returned.
    
    Conversely,
    
    print_r_ElementTypesR(\$A->getDelegateExact('PEAR'));
    Output:
</PRE>
";
print_r_ElementTypes($A->getDelegateExact('PEAR'));
echo
"<PRE>
    We can ask for multiple classes as well:
    
    echo \"< PRE>\\n\";
    print_r_ElementTypesR(\$A->getDelegateExact('PEAR', 'B', 'ADelegate1', 'ADelegate2'));
    echo \"< /PRE>\\n\";
    Output:
</PRE>
";
echo "<PRE>";
print_r_ElementTypesR($A->getDelegateExact('PEAR', 'B', 'ADelegate1', 'ADelegate2'));
echo "</PRE>";
echo
"<PRE>
    While one should only have access to the native delegates, methods are provided for
    delving deeper into the inheritance hierarchy.
    
    For instance:
    
    print_r_ElementTypes(\$A->getDelegateRecursive('PEAR'));
</PRE>
";
print_r_ElementTypes($A->getDelegateRecursive('PEAR'));
echo
"<PRE>
    This also handles requests for multiple classes:
    
    echo \"< PRE>\\n\";
    print_r_ElementTypes(\$A->getDelegateRecursive('PEAR', 'PEAR_Delegator', 'B', 'BDelegate1'));
    echo \"< /PRE>\\n\";
    output:
</PRE>
";
echo "<PRE>\n";
print_r_ElementTypesR($A->getDelegateRecursive('PEAR', 'PEAR_Delegator', 'B', 'BDelegate1'));
echo "</PRE>\n";
echo
"<PRE>
    We likewise have a recursive exact method:
    
    echo \"< PRE>\\n\";
    print_r_ElementTypesR(\$A->getDelegateRecursiveExact('PEAR', 'PEAR_Delegator', 'B', 'BDelegate1'));
    echo \"< /PRE>\\n\";
    Output:
</PRE>
";
echo "<PRE>\n";
print_r_ElementTypesR($A->getDelegateRecursiveExact('PEAR', 'PEAR_Delegator', 'B', 'BDelegate1'));
echo "</PRE>\n";
echo
"<PRE>
    We can also fetch the native delegate that can resond to a particular method:
    
    echo \"< PRE>\\n\";
    print_r_ElementTypesR(\$A->getDelegateForMethod(\"foo\", \"bar\", \"awesome1\", \"awesome2\", \"addDelegate\"));
    echo \"< /PRE>\\n\";
    Output:
</PRE>
";
echo "<PRE>\n";
print_r_ElementTypesR($A->getDelegateForMethod("foo", "bar", "awesome1", "awesome2", "addDelegate"));
echo "</PRE>\n";
echo
"<PRE>
    You can also get the first native responder found (native delegates are return in favor of nonnative):
    
    print_r_ElementTypes(\$A->getDelegateForMethodFirst(\"addDelegate\", \"notAMethod\"));
    Output:
</PRE>
";
print_r_ElementTypes($A->getDelegateForMethodFirst("addDelegate", "notAMethod"));
echo "</PRE>\n";
echo
"<PRE>
    The second argument makes the output an array, but if one argument is passed, the object is returned:
    
    echo get_class(\$A->getDelegateForMethodFirst(\"awesome2\"));
    Output:
</PRE>
";
echo get_class($A->getDelegateForMethodFirst("awesome2"));
echo
"<PRE>
    There are also recursive methods for getting delegates that respond to a particular method:
    
    echo \"< PRE>\\n\";
    print_r_ElementTypesR(\$A->getDelegateForMethodRecursive(\"foo\",\"bar\", \"awesome1\", \"awesome2\", \"addDelegate\"));
    echo \"< /PRE>\\n\";
    Output:
</PRE>
";
echo "<PRE>\n";
print_r_ElementTypesR($A->getDelegateForMethodRecursive("foo", "bar", "awesome1", "awesome2", "addDelegate"));
echo "</PRE>\n";
echo
"<PRE>
    We can get the delegates that actually implement (or naturally inherit) the methods too:
    
    echo \"< PRE>\\n\";
    print_r_ElementTypesR(\$A->getDelegateForMethodRecursiveExact(\"foo\",\"bar\", \"awesome1\", \"awesome2\", \"addDelegate\"));
    echo \"< /PRE>\\n\";
    Output:
</PRE>
";
echo "<PRE>\n";
print_r_ElementTypesR($A->getDelegateForMethodRecursiveExact("foo", "bar", "awesome1", "awesome2", "addDelegate"));
echo "</PRE>\n";
echo
"<PRE>
    We can get the delegates that actually implement one method too:
    
    echo \"< PRE>\\n\";
    print_r_ElementTypes(\$A->getDelegateForMethodRecursiveExact(\"foo\"));
    echo \"< /PRE>\\n\";
    Output:
</PRE>
";
print_r_ElementTypes($A->getDelegateForMethodRecursiveExact("foo"));
echo
"<PRE>
    Much like you can use the instanceof operator to test for the kind of class, you
    can test for the kind of delegate inheritance an object has:
    
    echo (\$A->hasDelegate('B')) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo ($A->hasDelegate('B')) ? "yes" : "no";
echo
"<PRE>
    This also takes into account delegates lower in the hierarchy:
    
    echo (\$A->hasDelegate('BDelegate1')) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo ($A->hasDelegate('BDelegate1')) ? "yes" : "no";
echo
"<PRE>
    This works with objects too:
    
    echo (\$A->hasDelegate(\$A->getDelegateExact('BDelegate2'))) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo ($A->hasDelegate($A->getDelegateExact('BDelegate2'))) ? "yes" : "no";
echo
"<PRE>
    You can also determine if a delegate of a specific class is available:
    
    echo (\$A->hasDelegateExact('BDelegate1')) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo ($A->hasDelegateExact('BDelegate1')) ? "yes" : "no";
echo
"<PRE>
    But,
    
    echo (\$A->hasDelegateExact('B')) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo ($A->hasDelegateExact('B')) ? "yes" : "no";
echo
"<PRE>
    These methods only test the delegates though. You can actually invoke a delegate-aware
    version of the is_a() function on any object:
    
    echo (PEAR_Delegator::isA(\$A, 'PEAR_Delegator')) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo (PEAR_Delegator::isA($A, 'PEAR_Delegator')) ? "yes" : "no";
echo
"<PRE>
    or:
    
    echo (PEAR_Delegator::isA(\$A, 'Extra2')) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo (PEAR_Delegator::isA($A, 'PEAR_Delegator')) ? "yes" : "no";
echo
"<PRE>
    This method also recognizes classes:
    
    echo (PEAR_Delegator::isA('PEAR_Delegator', 'PEAR')) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo (PEAR_Delegator::isA('PEAR_Delegator', 'PEAR')) ? "yes" : "no";
echo
"<PRE>
    There is also the is_aExact() method, but this is invoked when is_a() is called,
    so it is mostly used internally.
    
    You can also test whether or not an object implements a certain method, whether
    native or not:
    
    echo (\$A->respondsToMethod(\"awesome3\")) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo ($A->respondsToMethod("awesome3")) ? "yes" : "no";
echo
"<PRE>
    Or,
    
    echo (\$A->respondsToMethod(\"awesome2\")) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo ($A->respondsToMethod("awesome2")) ? "yes" : "no";
echo
"<PRE>
    This actually calls an extension of method_exists(), which handles
    class objects as well:
    
    echo (PEAR_Delegator::methodExists('Extra2', \"awesome2\")) ? \"yes\" : \"no\";
    Output:
</PRE>
";
echo (PEAR_Delegator::methodExists('Extra2', "awesome2")) ? "yes" : "no";
echo
"<PRE>
    There are also methods for removing delegates.
    
    For instance:
    
    \$A->removeDelegate('Extra2', 'ADelegate2');
    echo \"< PRE>\";
    print_r(\$A->getAllDelegates())
    echo \"< /PRE>\";
    Output:
</PRE>
";
$A->removeDelegate('Extra2', 'ADelegate2');
echo "<PRE>";
print_r($A->getAllDelegates());
echo "</PRE>";
echo
"<PRE>
    You'll notice the proper delegates are gone.
    
    We can also remove delegates recursively, though only exact delegates
    can be removed in this fashion, because it is superfluous otherwise:
    
    \$A->removeDelegateRecursiveExact('BDelegate2');
    echo \"< PRE>\";
    print_r(\$A->getAllDelegates())
    echo \"< /PRE>\";
    Output:
</PRE>
";
$A->removeDelegateRecursiveExact('BDelegate2');
echo "<PRE>";
print_r($A->getAllDelegates());
echo "</PRE>";
echo
"<PRE>
    We can also remove all of the delegates:
    
    \$A->removeAllDelegates();
    
    Now we can't call any delegate method (there should be a very specific error):
    
    \$A->setMessage1();
    Output:
</PRE>
";
$A->removeAllDelegates();
$A->setMessage1();
?>
</BODY>
</HTML>
