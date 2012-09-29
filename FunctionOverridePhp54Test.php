<?php

namespace Test;

include_once "MyClass.php";

use MyNamespace\MyClass;

/**
 * @author Vadim Tyukov <brainreflex@gmail.com>
 * @since 9/29/12
 */
class FunctionOverridePhp54Test extends \PHPUnit_Framework_TestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        if (version_compare(PHP_VERSION, '5.4', '<')) {
            $this->markTestSkipped('PHP version is not suitable');
        }
    }

    public function testOverrideFunction()
    {
        $my_class = new MyClass();
        $this->assertEquals(range(1,3), $my_class->makeMeRange());

        include_once "MyNamespaceFunctions.php";

        $my_class = new MyClass();
        $this->assertEquals(range(1,3), $my_class->makeMeRange());
    }
}
