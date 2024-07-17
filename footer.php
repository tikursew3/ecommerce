<?php

            $local = true;
            /*       
            $docRoot = "http://" . $_SERVER['HTTP_HOST'];
            if ($local == false) {
                $docRoot = "http://" . $_SERVER['HTTP_HOST'] . "/~ics325su2207/";
            }
            */
            $path = $_SERVER['DOCUMENT_ROOT']; 
            if($local == false) {
                $path = $_SERVER["CONTEXT_DOCUMENT_ROOT"];  
            }



            //$path = $_SERVER['DOCUMENT_ROOT']; 
            $footer= $path."/Ecommerce_Website_Copy/includes/footer.php";  
            include($footer);

        ?>