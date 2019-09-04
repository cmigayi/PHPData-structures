<?php

class Node{
	public $data;
	public $next;
	public $prev;

	public function __construct($data){
		$this->data = $data;
		$this->next = null;
		$this->prev = null;
	}
}

class DoublyLinkedList{
	private $head;
	private $temp;

	public function __construct(){
		$this->head = null;
	}

	// Add node at the front
	public function push($data){
		// new node, allocate data
		$node = new Node($data);

		// Make next of new node as head and prev as none 
		$node->next = $this->head;
		$node->prev = null; 

		// Change prev of head node to new node
		if($this->head != null){
			$this->head->prev = $node;
		}

		// Move head to point to new node
		$this->head = $node;

		return $node;
	}

	public function printList(){
		$this->temp = $this->head;

		// Loop to print all node values
		echo "Traversal in forward direction <br/>";
		while($this->temp){
			$next = $this->temp->next;
			if($next != null){
				echo $this->temp->data."(".$next->data.") ->";
			}else{
				echo $this->temp->data;
			}			
			$last = $this->temp;
			$this->temp = $next; 
		}

		echo "<br/><br/>Traversal in reverse direction <br/>";
		while($last){
			$prev = $last->prev;
			if($prev == null){
				echo $last->data;
			}else{
				echo $last->data."(".$prev->data.")<- ";
			}
			$last = $prev;
		}

		echo "<br/> Head is: ".$this->head->data;
	}

}

$dLL = new DoublyLinkedList();
$dLL->push(6);
$dLL->push(17);
$dLL->push(10);
$dLL->push(3);


$dLL->printList();

