<?php
/** @var app\lib\BankTransactions|\app\lib\BankTransaction[] $transactions */

?>
<h1>Upload new CSV</h1>

<p>Select CSV to upload</p>

<form method="post" enctype='multipart/form-data'>
    <input type="file" name="csv_file">
    <button type="submit">Upload CSV</button>
</form>

<h1>Bank Transactions from CSV</h1>

<table class="table">
    <thead>
    <th>Date</th>
    <th>Transaction Code</th>
    <th>Valid Transaction?</th>
    <th>Customer Number</th>
    <th>Reference</th>
    <th>Amount</th>
    </thead>
    <?php
    foreach ($transactions as $transaction) {
        $isValidTransaction = $transaction->getIsValidTransaction() ? 'Yes' : 'No';
        $isCredit = $transaction->getAmount()->isCredit() ? 'credit' : 'debit';
        echo "<tr>";
        echo "<td>{$transaction->getDate()->format('Y-m-d H:i:s')}</td>";
        echo "<td>{$transaction->getTransactionCode()}</td>";
        echo "<td>{$isValidTransaction}</td>";
        echo "<td>{$transaction->getCustomerNumber()}</td>";
        echo "<td>{$transaction->getReference()}</td>";
        echo "<td class='{$isCredit}'>{$transaction->getAmount()->getValue()}</td>";
        echo "</tr>";
    }
    ?>
</table>