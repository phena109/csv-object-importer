<?php


namespace app\lib;


use League\Csv\Reader;

class TransactionCSVLoader
{
    private BankTransactions $transactions;

    /**
     * @throws \League\Csv\Exception
     * @throws \Exception
     */
    public function __construct($path_to_csv)
    {
        $this->transactions = new BankTransactions();
        $reader = Reader::createFromPath($path_to_csv);
        $reader->setHeaderOffset(0);
        foreach ($reader->getRecords() as $row) {
            $this->transactions[] = new BankTransaction($row['Date'],
                $row['TransactionNumber'], $row['CustomerNumber'],
                $row['Reference'], $row['Amount']);
        }
    }

    /**
     * @return BankTransactions
     */
    public function getTransactions(): BankTransactions
    {
        return $this->transactions;
    }
}