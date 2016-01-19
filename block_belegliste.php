<?php 
class block_belegliste  extends block_base 
{
    function init() 	
    {
        $this->title = get_string('pluginname', 'block_belegliste');
    }	
    function get_content() 
    {
        global $USER;    
       
       
        //$srvpath                   = 'http://lernserver.el.haw-hamburg.de/haw/belegverfahren/belegliste/index.php';   // Live-Server
         $srvpath                = 'http://localhost/haw/belegverfahren/belegliste/index.php';                      // Dev-Server 
     
       
        $idm = 
          "?u=" .rawurlencode( base64_encode( $USER->username	 ))	
		."&fn=" .rawurlencode( base64_encode( $USER->firstname	 ))  
		."&ln=" .rawurlencode( base64_encode( $USER->lastname	 ))	
		."&se=" .rawurlencode( base64_encode( $USER->phone1		 )) 
	    ."&m="  .rawurlencode( base64_encode( $USER->email		 ))	
		."&id=" .rawurlencode( base64_encode( $USER->idnumber	 )) 
		."&sg=" .rawurlencode( base64_encode( $USER->institution )) 
		."&dp=" .rawurlencode( base64_encode( $USER->department  )) ;
		 

 
		$contentA = "<iframe 	scrolling		=\"no\"  
								marginheight	=\"0\" 
								marginwidth		=\"0\" 
								frameborder		=\"0\" 
								width			=\"275px\"    
								height			=\"500px\" 
	                            src             =".$srvpath.$idm.">
					</iframe>";
		
       
        if ($this->content !== NULL) 
        {        
            return $this->content;    
        }
        $this->content = new stdClass;    
        $this->content->text = $contentA;    
       $this->content->footer = '-Belegliste-';    
        return $this->content;	
    }	

    public function applicable_formats() 
    {
      return array
      (
          'site-index' => false,
          'course-view' => true, 
          'my-index' => false, 
          'mod' => false, 
       );
     }

	public function instance_allow_multiple() 
	{
      return false;
    }
    

    function hide_header() 	
    {	
        return false;	
    }
}?>
