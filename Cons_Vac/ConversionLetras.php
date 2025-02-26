<?php 


function titleCase($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc"), $exceptions = array("en", "su", "de", "del", "con", "sin","y","la","el","los","las", "I", "II", "III", "IV", "V", "VI","VII","VIII","IX")) { 
    /* * Exceptions in lower case are words you don't want converted * Exceptions all in upper case are any words you don't want converted to title case * but should be converted to upper case, eg: * king henry viii or king henry Viii should be King Henry VIII */
     $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8"); 
     foreach ($delimiters as $dlnr => $delimiter)
      {
           $words = explode($delimiter, $string); $newwords = array(); foreach ($words as $wordnr => $word)
            {
                 if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions))
                  { 
                      // check exceptions list for any words that should be in upper case 
                      $word = mb_strtoupper($word, "UTF-8");
                     } 
                     elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions))
                      { 
                          // check exceptions list for any words that should be in upper case
                           $word = mb_strtolower($word, "UTF-8");
                         } 
                         elseif (!in_array($word, $exceptions))
                          {
                               // convert to uppercase (non-utf8 only)
                                $word = ucfirst($word); } array_push($newwords, $word); 
                            } 
                            $string = join($delimiter, $newwords);
                         }
                         return $string;
                         }
// $s = 'sueldos y salarios II'; 
// $v = titleCase($s); 
// echo $v;

?>