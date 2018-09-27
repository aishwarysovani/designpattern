<?php
//interface observer
interface Observer {
  function onChanged($sender, $args);
}

//interface which will observed by observer
interface Observable {
  function addObserver($observer);
}


/**
 * class implements interface for add observer customer
 */
class CustomerList implements Observable {
  private $_observers = array();
  
  public function addCustomer($name) {
    foreach($this->_observers as $obs)
      $obs->onChanged($this, $name);
  }
  
  public function addObserver($observer) {
    $this->_observers []= $observer;
  }
}

/**
 * class give log of obervers
 */
class CustomerListLogger implements Observer {
  
    public function onChanged($sender, $args) {
    echo( "'$args' Customer has been added to the list \n" );
  }
}


$cl = new CustomerList();
$cl->addObserver( new CustomerListLogger() );
echo "\n enter customer name:";
$name=readline();
$cl->addCustomer($name);

?>