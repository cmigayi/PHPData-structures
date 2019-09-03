<?php

class Node{
	public $value;
	public $next;

	public function __construct($value){
		$this->value = $value;
		$this->next = null;
	}
}

class LinkedList{
	private $head;
	private $temp;
	public $count;	

	public function __construct(){
		$this->head = null;
	}

	public function newNode($value){
		$node = new Node($value);
		$this->count++;

		//First node (Head)
		if($this->count == 1){
			$this->head = $node;
		}
		return $node; 
	}

	public function printList(){
		$this->temp = $this->head;

		// Loop to print all node values
		while($this->temp){
			$next = $this->temp->next;
			if($next != null){
				echo $this->temp->value."(".$next->value.") ->";
			}else{
				echo $this->temp->value;
			}
			$this->temp = $next; 
		}
		echo "<br/>".$this->count."<br/> Head is: ".$this->head->value;
	}

	public function deleteNode($node){
		$this->temp = $this->head;		

		// loop while checking if it's first node (Head)  
		while($this->temp->value != $node->value){

			// check for last node
			if($this->temp->next == null){
				return null;
			}else{
				$prev = $this->temp;

				// proceed to the next node
				$this->temp = $this->temp->next;
			}
		}

		// if it's first node (head)
		if($this->temp == $this->head){
			// Replace current Head with the next node
			$this->head = $this->head->next;
		}else{
			$prev->next = $this->temp->next;
		}
		return $this->temp;
	}
}

$lL = new LinkedList();
// $head = new Node(13);
// $second = new Node(102);
// $third = new Node(73);
$head = $lL->newNode(13); 
$second = $lL->newNode(102);
$third = $lL->newNode(73);
$fourth = $lL->newNode(100);

$head->next = $second;
$second->next = $third;
$third->next = null;
$lL->deleteNode($third);
$second->next = $fourth;
$fourth->next = null;
$lL->printList();


