<?php


namespace Phena109\CsvObjectImporter\Lib;


use DateTime;

class BankTransaction
{
    private DateTime $date;

    private string $transaction_number;

    private int $customer_number;

    private string $reference;

    /**
     * @var int in cents
     */
    private int $amount;

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getTransactionNumber(): string
    {
        return $this->transaction_number;
    }

    /**
     * @param string $transaction_number
     */
    public function setTransactionNumber(string $transaction_number): void
    {
        $this->transaction_number = $transaction_number;
    }

    /**
     * @return int
     */
    public function getCustomerNumber(): int
    {
        return $this->customer_number;
    }

    /**
     * @param int $customer_number
     */
    public function setCustomerNumber(int $customer_number): void
    {
        $this->customer_number = $customer_number;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }
}