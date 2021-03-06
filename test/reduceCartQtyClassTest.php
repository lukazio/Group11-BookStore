<?php

/**
 * Generated by PHPUnit_SkeletonGenerator
 */
require_once '../testClass/reduceCartQtyClass.php';

class reduceCartQtyClassTest extends PHPUnit_Framework_TestCase {

    protected $object;

    protected function setUp() {
        $this->object = new reduceCartQtyClass;
    }

    protected function tearDown() {
        unset($this->object);
    }
    
    public function testEnoughQtyToReduceCorrect(){
        $this->assertTrue($this->object->testEnoughQtyToReduce(2));
        $this->assertTrue($this->object->testEnoughQtyToReduce(1));
        $this->assertFalse($this->object->testEnoughQtyToReduce(0));
    }

    public function testReduceQtyCorrect(){
        $this->assertTrue($this->object->testReduceQty("1", 10));
        $this->assertFalse($this->object->testReduceQty("2", 69));
    }
    
}
