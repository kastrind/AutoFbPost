<?php
/**
 * Copyright 2017 Facebook, Inc.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */
namespace Facebook\Tests\GraphNodes;

use Facebook\GraphNodes\GraphNodeFactory;
use Facebook\GraphNodes\GraphPage;
use Facebook\GraphNodes\GraphUser;
use Facebook\FacebookResponse;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

class GraphAlbumTest extends TestCase
{

    /**
     * @var FacebookResponse|ObjectProphecy
     */
    protected $responseMock;

    protected function setUp()
    {
        $this->responseMock = $this->prophesize(FacebookResponse::class);
    }

    public function testDatesGetCastToDateTime()
    {
        $dataFromGraph = [
            'created_time' => '2014-07-15T03:54:34+0000',
            'updated_time' => '2014-07-12T01:24:09+0000',
            'id' => '123',
            'name' => 'Bar',
        ];

        $this->responseMock->getDecodedBody()->willReturn($dataFromGraph);
        $factory = new GraphNodeFactory($this->responseMock->reveal());
        $graphNode = $factory->makeGraphAlbum();

        $createdTime = $graphNode->getCreatedTime();
        $updatedTime = $graphNode->getUpdatedTime();

        $this->assertInstanceOf(\DateTime::class, $createdTime);
        $this->assertInstanceOf(\DateTime::class, $updatedTime);
    }

    public function testFromGetsCastAsGraphUser()
    {
        $dataFromGraph = [
            'id' => '123',
            'from' => [
                'id' => '1337',
                'name' => 'Foo McBar',
            ],
        ];

        $this->responseMock->getDecodedBody()->willReturn($dataFromGraph);
        $factory = new GraphNodeFactory($this->responseMock->reveal());
        $graphNode = $factory->makeGraphAlbum();

        $from = $graphNode->getFrom();

        $this->assertInstanceOf(GraphUser::class, $from);
    }

    public function testPlacePropertyWillGetCastAsGraphPageObject()
    {
        $dataFromGraph = [
            'id' => '123',
            'name' => 'Foo Album',
            'place' => [
                'id' => '1',
                'name' => 'For Bar Place',
            ]
        ];

        $this->responseMock->getDecodedBody()->willReturn($dataFromGraph);
        $factory = new GraphNodeFactory($this->responseMock->reveal());
        $graphNode = $factory->makeGraphAlbum();

        $place = $graphNode->getPlace();

        $this->assertInstanceOf(GraphPage::class, $place);
    }
}
