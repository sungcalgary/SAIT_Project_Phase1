<?php
/**
Author: Sunghyun Lee
Created: 2018-06-05
Last Modified: 2018-09-12

*/

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

    	// finds name of products that exist in a package
    	$sql = "SELECT pd.ProdName FROM packages pk
    	        INNER JOIN packages_products_suppliers pps ON pk.PackageId=pps.PackageId
    			INNER JOIN products_suppliers ps ON pps.ProductSupplierId=ps.ProductSupplierId
    			INNER JOIN products pd ON ps.productId=pd.productId

    			WHERE pk.PackageId = $pkgId";
    	$result=$myDb->query($sql);
    	while ($row = $result->fetch_row())
    		$this->productNames[]= $row[0];
    	
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




?>