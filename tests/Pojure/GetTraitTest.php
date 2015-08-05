<?php

namespace Pojure;

class GetTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testGetListByIndex()
    {
        $getTrait = $this->getObjectForTrait('Pojure\GetTrait');

        $result = $getTrait->get([1, 2, 3], 1);

        $this->assertEquals(2, $result);
    }

    public function testGetListByInexistentIndexReturnsNull()
    {
        $getTrait = $this->getObjectForTrait('Pojure\GetTrait');

        $result = $getTrait->get([1, 2, 3], 5);

        $this->assertNull($result);
    }

    public function testGetHashByIndex()
    {
        $getTrait = $this->getObjectForTrait('Pojure\GetTrait');

        $result = $getTrait->get(['a' => 1, 'b' => 2], 'b');

        $this->assertEquals(2, $result);
    }

    public function testGetHashByInexistentIndexReturnsNotFoundWhenDefined()
    {
        $getTrait = $this->getObjectForTrait('Pojure\GetTrait');

        $result = $getTrait->get(['a' => 1, 'b' => 2], 'z', 'missing');

        $this->assertEquals('missing', $result);
    }
}
