<?php

# Patron usado: Factory

class SaleBill{

    private $legalItems = [];

    public function addItems($item){

        $this->legalItems[] = $item;
    }

    public function listElements(){
        echo 'Bill elements: '. implode(', ', $this->legalItems);
    }
}

interface CompelteBillConstructor {

    public function addIssuerDetails();
    public function addRecipientDetails();
    public function addProductDetails();
    public function addSpecificDate();
    public function addTotalValueBill();
    public function addItemizedTaxes();
    public function addPaymentMethod();
    public function addAdditionalData();
    public function getSaleBill();

}

class CompleteBill implements CompelteBillConstructor{

    private $saleBill;

    public function __construct() {
        
        $this->saleBill = new SaleBill();
    }

    public function addIssuerDetails() {
        $this->saleBill->addItems('IssuerDetails');
    }

    public function addRecipientDetails() {
        $this->saleBill->addItems('RecipientDetails');
    }

    public function addProductDetails() {
        $this->saleBill->addItems('ProductDetails');
    }

    public function addSpecificDate() {
        $this->saleBill->addItems('SpecificDate');
    }

    public function addTotalValueBill() {
        $this->saleBill->addItems('TotalValueBill');
    }

    public function addItemizedTaxes() {
        $this->saleBill->addItems('ItemizedTaxes');
    }

    public function addPaymentMethod() {
        $this->saleBill->addItems('PaymentMethod');
    }

    public function addAdditionalData() {
        $this->saleBill->addItems('AdditionalData');
    }

    public function getSaleBill() {

        return $this->saleBill;
    }

}

class BillDirector {

    public function buildCompleteBill(CompelteBillConstructor $construtor) {

        $construtor->addIssuerDetails();
        $construtor->addRecipientDetails();
        $construtor->addProductDetails();
        $construtor->addSpecificDate();
        $construtor->addTotalValueBill();
        $construtor->addItemizedTaxes();
        $construtor->addPaymentMethod();
        $construtor->addAdditionalData();

        return $construtor->getSaleBill();
    }
}

$director = new BillDirector();
$construtor = new CompleteBill();

$bill = $director->buildCompleteBill($construtor);
$bill->listElements();