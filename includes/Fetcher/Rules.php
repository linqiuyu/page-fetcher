<?php

namespace PF\Fetcher;

use QL\QueryList;

/**
 * Class Rules
 * @package PF\Fetcher
 */
class Rules {

    /**
     * @var array
     */
    private array $rules;

    /**
     * @var string|null
     */
    private ? string $range;

    /**
     * @var QueryList
     */
    private QueryList $ql;

    /**
     * Rules constructor.
     * @param string $html
     * @param array $rules
     * @param string|null $range
     */
    public function __construct( string $html, array $rules, ? string $range = null ) {
        $this->rules = $rules;
        $this->range = $range;
        $this->ql = QueryList::html( $html );
    }

    /**
     * 获取数据
     * @return array
     */
    public function get_data() : array {
        if ( $this->range ) {
            $this->ql = $this->ql->range( $this->range );
        }

        return $this->ql->rules( $this->rules )->queryData();
    }

}