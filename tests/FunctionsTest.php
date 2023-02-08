<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase {

    public function testSuccessDisplayGames()
    {
        $expected = '<div>
                            <h1>Cuthbert Land</h1>
                            <p>2023</p>
                            <img src="cuthbert.jpg" />
                        </div>';
        $input = [
            [
                'name' => 'Cuthbert Land',
                'year' => '2023',
                'img' => 'cuthbert.jpg',
            ]
        ];
        $case = displayGames($input);
        $this->assertEquals($expected, $case);
    }

    public function testFailureDisplayGames()
    {
        $expected = '';
        $input = [
            [
                'year' => '2023',
                'img' => 'cuthbert.jpg',
            ]
        ];
        $case = displayGames($input);
        $this->assertEquals($expected, $case);
    }

    public function testMalformedDisplayGames()
    {
        $input = 3;
        $this->expectException(TypeError::class);
        $case = displayGames($input);
    }
}