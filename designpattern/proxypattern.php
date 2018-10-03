<?php
/**
 * interface for abstract command function
 */
interface CommandExecutor {

    function runCommand($cmd);
}

/**
 * class for admin to implement command
 */
class CommandExecutorImpl implements CommandExecutor {

    function runCommand($cmd) 
    {
		echo"'" . $cmd . "' command executed.";
	}

}


/**
 * proxy class for executor which have priviledges to admin
 */
class CommandExecutorProxy implements CommandExecutor {
    
       protected $isAdmin=false;
       protected $executer;

	function __construct($user,$pwd)
    {
        if(("Pankaj"==$user) && ("J@urnalDev"==$pwd)) 
            $this->isAdmin=true;
        $this->executor = new CommandExecutorImpl();
    }
    
    /**
    * function will check command for admin or user
    */
	function runCommand($cmd) {

		if($this->isAdmin){
			$this->executor->runCommand($cmd);
		}else{
			if(trim($cmd,"rm")){
				throw new Exception("rm command is not allowed for non-admin users.");
			}else{
				$this->executor->runCommand($cmd);
			}
		}
	}

}

$executor = new CommandExecutorProxy("abc", "wrong_pwd");
//$executor=new CommandExecutorProxy("Pankaj","J@urnalDev");
		try {
            $executor->runCommand("ls -ltr");
            echo"\n";
			$executor->runCommand(" rm -rf abc.pdf");
		} catch (Exception $e){
            
			throw new Exception('command not for general user');
        }
        
?>