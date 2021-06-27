<?php


namespace app\lib;


use DateTime;
use Exception;

class BankTransaction
{
    private DateTime $date;
    private string $transaction_code;
    private int $customer_number;
    private string $reference;
    private Currency $amount;

    private const VALID_CHARS = [
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',
        'J',
        'K',
        'L',
        'M',
        'N',
        'P',
        'Q',
        'R',
        'S',
        'T',
        'U',
        'V',
        'W',
        'X',
        'Y',
        'Z'
    ];

    /**
     * BankTransaction constructor.
     * @param string $date
     * @param string $transaction_number
     * @param string $customer_number
     * @param string $reference
     * @param string $amount
     * @throws Exception
     */
    public function __construct(
        string $date,
        string $transaction_number,
        string $customer_number,
        string $reference,
        string $amount
    ) {
        $this->init($date, $transaction_number, $customer_number, $reference,
            $amount);
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getTransactionCode(): string
    {
        return $this->transaction_code;
    }

    /**
     * @return int
     */
    public function getCustomerNumber(): int
    {
        return $this->customer_number;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @return Currency
     */
    public function getAmount(): Currency
    {
        return $this->amount;
    }

    /**
     * @param string $date
     * @param string $transaction_number
     * @param string $customer_number
     * @param string $reference
     * @param string $amount
     * @throws Exception
     */
    private function init(
        string $date,
        string $transaction_number,
        string $customer_number,
        string $reference,
        string $amount
    ) {
        $this->date = new DateTime($date);
        $this->transaction_code = $transaction_number;
        $this->customer_number = intval($customer_number);
        $this->reference = $reference;
        $this->amount = new Currency(intval($amount));
    }

    public function getIsValidTransaction(): bool
    {
        return $this->VerifyKey($this->transaction_code);
    }

    private function VerifyKey(string $key): bool
    {
        if (strlen($key) != 10) {
            return false;
        }

        $checkDigit = $this->GenerateCheckCharacter(substr(strtoupper($key), 0,
            9));
        return $key[9] === $checkDigit;
    }

    /**
     * Implementation of algorithm for check digit
     * @param string $input
     * @return string
     */
    private function GenerateCheckCharacter(string $input): string
    {
        $factor = 2;
        $sum = 0;
        $n = count(self::VALID_CHARS);
        for ($i = (strlen($input) - 1); $i >= 0; $i--) {
            $codePoint = array_search($input[$i], self::VALID_CHARS);
            $addend = $factor * $codePoint;
            $factor = ($factor == 2) ? 1 : 2;
            $addend = ($addend / $n) + ($addend % $n);
            $sum += $addend;
        }
        $remainder = $sum % $n;
        $checkCodePoint = ($n - $remainder) % $n;
        return self::VALID_CHARS[$checkCodePoint];
    }
}