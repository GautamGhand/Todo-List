<?php 
function validate($fields)
{
    $error=[];
    foreach($fields as $k=>$v)
    {
        if(empty($fields[$k]))
        {
            if($k=='title' || $k=='description')
            {
                $error[$k]="Please Enter ".strtoupper($k);
            }
        }
        else
        {
            $fields[$k]=trim($fields[$k]);
            if(empty($fields[$k]))
            {
                $error[$k]="Please Don't Enter Spaces in ".strtoupper($k);
            }
        }
    }
    return $error;
}

?>