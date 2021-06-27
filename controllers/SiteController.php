<?php

namespace app\controllers;

use app\lib\BankTransactions;
use app\lib\TransactionCSVLoader;
use yii\web\Controller;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    private BankTransactions $transactions;

    public $enableCsrfValidation = false;

    /**
     * SiteController constructor.
     * @param $id
     * @param $module
     * @param array $config
     * @throws \League\Csv\Exception
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        if ($this->request->getIsPost()) {
            $csv_file = UploadedFile::getInstanceByName('csv_file');
            $loader = new TransactionCSVLoader($csv_file->tempName);
            $this->transactions = $loader->getTransactions();
            $this->transactions->asort();
        } else {
            $this->transactions = new BankTransactions();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'transactions' => $this->transactions
        ]);
    }
}
