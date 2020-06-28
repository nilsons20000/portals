<?php
if(!empty($posts ))  
{ 
    $count = 1;
    $outputhead = '';
    $outputbody = '';  
    $outputtail ='';

    $outputhead .= '<div class="table-responsive">
                    <table class="table table-bordered">
                    <tbody>';
                  
    foreach ($posts as $post)    {   
    $body = substr(strip_tags($post->body),0,50)."...";
    $show = url('blog/article/'.$post->slug);
    $outputbody .=  ' 
                    <tr> 
                       <td><a href="'.$show.'" target="_blank" title="SHOW" ><span class="glyphicon glyphicon-list"></span>'.$post->title.'</a></td>
                    </tr> ';
    }
    $outputtail .= ' 
                     </tbody>
                    </table>
                </div>';
         
    echo $outputhead; 
    echo $outputbody; 
    echo $outputtail; 
 }  
 
 else  
 {  
    echo 'Rakstu nav';  
 } 
 ?>  