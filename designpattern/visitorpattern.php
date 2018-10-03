<?php
//interface for item
interface ItemElement {

	function accept($visitor);
}

//interface for visitor shopping cart
interface ShoppingCartVisitor {

	function visit($book);
	function visit1($fruit);
}

/**
 * class implements interface for book item 
 */
class Book implements ItemElement {

	protected $price;
	protected $isbnNumber;
	
	function __construct($cost,$isbn){
        $this->price=$cost;
		$this->isbnNumber=$isbn;
        
    }
    
    function getPrice() {
		return $this->price;
	}

	function getIsbnNumber() {
		return $this->isbnNumber;
	}

	function accept($visitor) {
		return $visitor->visit($this);
	}

}

/**
 * class implements interface for fruit item
 */
class Fruit implements ItemElement {
	
	protected $pricePerKg;
	protected $weight;
	protected $name;
	
	function __construct($priceKg,$wt,$nm){
		$this->pricePerKg=$priceKg;
		$this->weight=$wt;
		$this->name = $nm;
	}
	
	function getPricePerKg() {
		return $this->pricePerKg;
	}


	function getWeight() {
		return $this->weight;
	}

	function getName(){
		return $this->name;
	}
	
	function accept($visitor) {
		return $visitor->visit1($this);
	}

}

/**
 * class implements function for calculating total cost 
 * for items visited to shopping cart
 */
class ShoppingCartVisitorImpl implements ShoppingCartVisitor {

	function visit($book) {
		$cost=0;
		//apply 5$ discount if book price is greater than 50
		if($book->getPrice() > 50){
			$cost = $book->getPrice()-5;
        }
        else 
            $cost = $book->getPrice();
		    echo"\n Book ISBN::" . $book->getIsbnNumber() . " cost =" . $cost;
		    return $cost;
    }
    
	function visit1($fruit) {
		$cost = $fruit->getPricePerKg() * $fruit->getWeight();
		echo "\n " . $fruit->getName() . " cost = ". $cost;
		return $cost;
	}

}

/**
 * @array
 */
$items=array();
$items[1] =new Book(20, "1234");
$items[2]=new Book(100, "5678");
$items[3]=new Fruit(10, 2, "Banana");
$items[4]=new Fruit(5, 5, "Apple");

$total = calculatePrice($items);
echo"\n Total Cost = " . $total;

function calculatePrice($items) {
$visitor = new ShoppingCartVisitorImpl();
$sum=0;
foreach($items as $item){
$sum = $sum + $item->accept($visitor);
}
return $sum;
}

?>