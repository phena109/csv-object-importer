<h1>Upload new CSV</h1>

<p>Select CSV to upload</p>

<form action="" method="post" enctype='multipart/form-data'>
    <input type="file" name="csv_file">
    <button type="submit">Upload CSV</button>
</form>

<h1>Bank Transactions from CSV</h1>

<table>
    <thead>
    <tr>Date</tr>
    <tr>Transaction Code</tr>
    <tr>Valid Transaction?</tr>
    <tr>Customer Number</tr>
    <tr>Reference</tr>
    <tr>Amount</tr>
    </thead>
    <?php
    foreach ($transactions as $transaction) {
        echo "<tr>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "</tr>";
    }
    ?>
</table>