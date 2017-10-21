<?php
namespace Melbahja\Http2;

interface PusherInterface
{

	/**
	 * Image
	 * @const str
	 */
	public const IMG = 'img';

	/**
	 * Scr
	 * @const str
	 */
	public const SRC = 'src';

	/**
	 * Link
	 * @const str
	 */
	public const LINK = 'link';


	public static function getInstance(): PusherInterface;

	public function link(string $link, array $opts = []): PusherInterface;

	public function src(string $link, array $opts = []): PusherInterface;

	public function img(string $link, array $opts = []): PusherInterface;

	public function set(string $type, string $link, array $opts = []): PusherInterface;

	public function getHeader(string $type = null): string;

	public function push(string $type = null): void;

	public function toHeader(string $type, array $urls): ?string;

}