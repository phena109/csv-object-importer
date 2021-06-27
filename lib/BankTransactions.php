<?php


namespace app\lib;


use ArrayIterator;

class BankTransactions extends ArrayIterator
{
    /**
     * @param string $key
     * @return BankTransaction
     */
    public function offsetGet($key)
    {
        return parent::offsetGet($key);
    }

    /**
     * @param string $key
     * @param BankTransaction $value
     */
    public function offsetSet($key, $value)
    {
        parent::offsetSet($key, $value);
    }

    /**
     * @param int $flags NOT IN USE
     */
    public function asort($flags = SORT_REGULAR)
    {
        parent::uasort(function (BankTransaction $a, BankTransaction $b) {
            return $a->getDate()->getTimestamp() > $b->getDate()->getTimestamp();
        });
    }
}