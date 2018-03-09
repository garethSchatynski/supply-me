pragma solidity ^0.4.18;

// contract name
contract supplymeContract {
//declare contract variables    
    string fName;
    uint age;
    address public owner;

// Variable address for who owns the contract and can make changes to the specified instructor  

//functions in contract that carry out actions
    function owned() public {
        // msg.sender refers to the address that creates contract 
        owner = msg.sender;
    }
    
    //Create fuction modifier that runs fuctions only if you are the owner of the contract
    modifier onlyOwner() {
        //"require" is the solidity lexis for "if"
        require(msg.sender == owner);
        //run function body
        _;
    }
    
    event Instructor(
        string name,
        uint age
        );
    
    //Function has the only owner modifier in the function
    function setInstructor(string _fName, uint _age) onlyOwner public {
    // Create a set function for variable stored on blockchain
        fName = _fName;
        age = _age;
        Instructor(_fName, _age);
    }
    
    //Retrive variables stored on Blockchain
    function getInstructor() public constant returns (string, uint) {
    return (fName, age);
    }
}