<?php

use Melbahja\Http2\{
	Pusher,
	PusherInterface,
	PusherException
};

class PusherTest extends \PHPUnit\Framework\TestCase
{


	/**
	 * instance
	 * @return PusherInterface
	 */
	public function testGetInstance()
	{
		$pusher = Pusher::getInstance();
		$this->assertInstanceOf(Pusher::class, $pusher);
		return $pusher;
	}

	/**
	 * @depends testGetInstance
	 */
	public function testSetLink($pusher)
	{
		$this->assertInstanceOf(Pusher::class, $pusher->link('test.css'));
		return $pusher;
	}

	/**
	 * @depends testSetLink
	 */
	public function testSetSrc($pusher)
	{
		$this->assertInstanceOf(Pusher::class, $pusher->link('test.js'));
		return $pusher;
	}

	/**
	 * @depends testSetSrc
	 */
	public function testSetImg($pusher)
	{
		$this->assertInstanceOf(Pusher::class, $pusher->link('test.png'));
		return $pusher;
	}

	/**
	 * @depends testSetImg
	 */
	public function testSetLinkWithOptions($pusher)
	{
		$this->assertInstanceOf(Pusher::class, $pusher->link('https://fonts.example.com', [
			'as' => false,
			'rel' => 'preconnect'
		]));
		
		return $pusher;
	}

	/**
	 * @depends testSetLinkWithOptions
	 */
	public function testHeader($pusher)
	{
		$line = $pusher->getHeader();
		$this->assertSame(gettype($line), 'string');
		$this->assertContains('test.css', $line);
		$this->assertContains('test.js', $line);
		$this->assertContains('test.png', $line);
		$this->assertContains('https://fonts.example.com', $line);
		$this->assertContains('rel=preconnect', $line);
		return $pusher;
	}

	/**
	 * @depends testHeader
	 */
	public function testPusherException($pusher)
	{
		$this->expectException(PusherException::class);
		$pusher->getHeader('invalid');
	}
}