<?php

namespace PF\Fetcher;

use Composer\DependencyResolver\Rule;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use QL\QueryList;

/**
 * Class Fetcher
 * @package PF\Fetcher
 */
class Fetcher {

    /**
     * @var Rules|null 采集规则
     */
    private ? Rules $rules = null;

    /**
     * @var string 采集链接
     */
    private string $url = '';

    /**
     * @var array|null Header
     */
    private ? array $headers = [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36',
        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'accept-language' => '*',
    ];

    /**
     * @var array|string|null 代理
     */
    private $proxy;

    /**
     * @var string
     */
    private string $method = 'GET';

    /**
     * @var Client|null
     */
    private ? Client $client = null;

    /**
     * @param string $url
     */
    public function set_url( string $url ) {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function get_url() : string {
        return trim($this->url);
    }

    /**
     * @param string $html
     * @param array $rules
     * @return Rules
     */
    public function run_rules( string $html, array $rules ) : Rules {
        if ( ! $this->rules ) {
            $this->rules = new Rules( $html, $rules );
        }
        return $this->rules;
    }

    /**
     * @param array|string $proxy
     */
    public function set_proxy( $proxy ) {
        $this->proxy = $proxy;
    }

    /**
     * @return array|string
     */
    public function get_proxy() {
        return $this->proxy;
    }

    /**
     * @param string $method
     */
    public function set_method( string $method ) {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function get_method() : string {
        return $this->method;
    }

    /**
     * @param array $headers
     */
    public function set_headers( array $headers ) {
        $this->headers = $headers;
    }

    /**
     * @return array|null
     */
    public function get_headers() : ? array {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function client_config() {
        $config = [];
        if ( $this->get_proxy() ) {
            $config['proxy'] = $this->get_proxy();
        }
        if ( $this->get_headers() ) {
            $config['headers'] = $this->get_headers();
        }

        return apply_filters( 'page_fetcher_client_config', $config );
    }

    /**
     * @return Client
     */
    public function client() : Client {
        if ( ! $this->client ) {
            $this->client = new Client( $this->client_config() );
        }

        return $this->client;
    }

    /**
     * 获取页面html代码
     * @return string
     * @throws GuzzleException
     */
    public function get_html() : string {
        $response = $this->client()->request( $this->get_method(), $this->get_url() );
        $html = (string) $response->getBody();
        $charset = preg_match( '/<meta.+?charset=[^\w]?([-\w]+)/i', $html, $match ) ? strtoupper( $match[1] ) : 'UTF-8';
        if ( $charset !== 'UTF-8' ) {
            $html = iconv( $charset, 'UTF-8', $html );
        }

        return $html;
    }

    /**
     * 抓取页面数据
     * @return array
     * @throws GuzzleException
     */
    public function process() : array {
        $rules = [
            'title' => [ 'article .entry-title', 'text' ],
            'content' => [ 'article .entry-content', 'html' ],
        ];
        return $this->run_rules( $this->get_html(), $rules )->get_data();
    }

}