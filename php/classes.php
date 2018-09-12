<?php
/**
PHP file where classes are created for SAIT Project
Author: Fantastic 4 (Jason, Brian, Lindsay, Sunghyun)
Created: 2018-06-05
Last Modified: 2018-06-08

*/

//===============Sunghyun Lee===================================
class Package
{	
	public $id;
	public $name;
	public $startDate;
	public $endDate;
	public $description;
	public $basePrice;
	public $agencyCommission;
	public $productSupplierIds=array();
	public $productIds=array();
	public $productNames=array();

	public function __construct($pkgId)
	{
		$this->id = $pkgId;
		$myDb = new mysqli('localhost', 'root', '','travelexperts');

		//get data from packages table
    	$sql = "SELECT PkgName,PkgStartDate, PkgEndDate,PkgDesc, PkgBasePrice, PkgAgencyCommission FROM packages WHERE PackageId = $pkgId";
    	$result=$myDb->query($sql);
    	$row = $result->fetch_row();
    	$this->name=$row[0];
    	$this->startDate =$row[1];
    	$this->endDate=$row[2];
    	$this->description=$row[3];
    	$this->basePrice=$row[4];
    	$this->agencyCommission=$row[5];

    	//get productSupplierId from packages_products_suppliers table
    	$sql = "SELECT ProductSupplierId FROM packages_products_suppliers WHERE PackageId = $pkgId";
    	$result=$myDb->query($sql);
    	while ($row = $result->fetch_row())
    		$this->productSupplierIds[]=$row[0];

    	//get productId from products_suppliers table
    	foreach ($this->productSupplierIds as $PSid)
    	{
    		$sql = "SELECT ProductId FROM products_suppliers WHERE ProductSupplierId = $PSid";
    		$result=$myDb->query($sql);
    		$row = $result->fetch_row();
    		$this->productIds[]= $row[0];
    	}

    	//get ProdName from products table
    	foreach ($this->productIds as $Pid)
    	{
    		$sql = "SELECT ProdName FROM products WHERE ProductId = $Pid";
    		$result=$myDb->query($sql);
    		$row = $result->fetch_row();
    		$this->productNames[]= $row[0];
    	}
    	
    	$myDb->close();
	}

	//check whether the package's start date has passed
	public function checkStartDate()
	{
		$currentDate=time();
		if ($currentDate>strtotime($this->startDate))
		{
			return false;
		}
		if ($currentDate<strtotime($this->startDate))
		{
			return true;
		}
	}
	//check whether the package's end date has passed
	public function checkEndDate()
	{
		$currentDate=time();
		if ($currentDate>strtotime($this->endDate))
		{
			return false;
		}
		if ($currentDate<strtotime($this->endDate))
		{
			return true;
		}
	}

}
//===================================================



?>