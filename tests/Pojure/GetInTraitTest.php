<?php

namespace Pojure;

class GetInTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider nestedListProvider
     */
    public function testGetNestedListByIndices($keys, $default, $expectedResult)
    {
        $getInTrait = $this->getObjectForTrait('Pojure\GetInTrait');

        $result = $getInTrait->getIn([[1, 2, 3], [4, 5, 6], [7, 8, 9]], $keys, $default);

        $this->assertSame($expectedResult, $result);
    }

    public function nestedListProvider()
    {
        return [
            [[0, 2], null, 3],
            [[2, 1], null, 8],
            [[4, 1], null, null],
            [[4, 1], 'missing', 'missing']
        ];
    }

    /**
     * @dataProvider nestedHashProvider
     */
    public function testGetNestedHashesByIndices($keys, $default, $expectedResult)
    {
        $getInTrait = $this->getObjectForTrait('Pojure\GetInTrait');

        $user = [
            'username' => 'sally',
            'profile' => [
                'name' => 'Sally Clojurian',
                'address' => ['city' => 'Austin', 'state' => 'TX']
            ]
        ];

        $result = $getInTrait->getIn($user, $keys, $default);

        $this->assertEquals($expectedResult, $result);
    }

    public function nestedHashProvider()
    {
        return [
            [['profile', 'name'], null, 'Sally Clojurian'],
            [['profile', 'address', 'city'], null, 'Austin'],
            [['profile', 'address', 'zip-code'], null, null],
            [['profile', 'address', 'zip-code'], 'missing', 'missing']
        ];
    }

    public function testGetMixedAssociativeTypesByIndices()
    {
        $getInTrait = $this->getObjectForTrait('Pojure\GetInTrait');

        $user = [
            'username' => 'jimmy',
            'pets' => [
                [
                    'name' => 'Rex',
                    'type' => 'dog',
                ],
                [
                    'name' => 'Sniffles',
                    'type' => 'hamster',
                ],
            ]
        ];

        $result = $getInTrait->getIn($user, ['pets', 1, 'type']);

        $this->assertEquals('hamster', $result);
    }
}
