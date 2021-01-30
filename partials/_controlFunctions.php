<?php
//  date formeting function
function dateFormet ($data){
    // echo $data;
    return date("d-m-Y H:i" ,strtotime($data));
}
// global $comment_id;

function replayfunctions($commentId){
    global $index;
    // echo ' id is ---> ' . $commentId;
    require '_dbconnect.php';

    $sqli = "SELECT `user_name`, `content`, `replay`.`id`, `replay`.`user_id`, `parant_id`, `replay`.`date` FROM `replay` INNER JOIN `users` ON `replay`.`user_id` = `users`.`user_id` WHERE `parant_id` = $commentId";

    $result = mysqli_query($conn,$sqli);
    $numOfRow = mysqli_num_rows($result);
    if($numOfRow > 0){
        while ($data = mysqli_fetch_assoc($result)){
            ++$index;
            $replay .= '
            <div class="row my-4">
                <div class="col-1 text-center">
                    <img src="img/userdefault.png" class="rounded" alt="userimg" width="54px">
                </div>
                <div class="col-11 textc">
                    <div><b>'.$data['user_name'] .'</b><small>  | '. dateFormet($data['date']) .' </small></div>
                    <p class="text d-inline" id="hp-'. $index .'">'
                    . substr($data['content'],0,50) .
                        '<a 
                            style="color:#9e9c9c; cursor:pointer; "
                            class="readmore"
                        >
                            ...read more 
                        </a>
                    </p>
                    <div class="p-0 moreWords" id="moreW-'. $index . '" style="display: none;">
                        '. substr($data['content'],0) .'
                    </div>
                    <div class="budget d-flex">
                        <div class="">
                            like
                        </div>
                        <div class="ms-2">
                            <a class="replaybtn" style="cursor:pointer;">REPLAY</a> 
                            <div class="form mt-3" id="replayinput-'. $index .'" style="display:none;">
                                <img src="img/userdefault.png" class="rounded" alt="userimg" width="25px">
                                <form style="display: -webkit-inline-box;" class="d-inline-box" action="'. $_SERVER['REQUEST_URI'] .'" method="post">
                                    <div class="input-group mb-3">
                                        <input type="hidden" value="'. $data['id'] .'" name="parentComment">
                                            <textarea type="text" class="form-control" name="replay" placeholder="Replay"
                                                aria-label="Replay" aria-describedby="button-addon2" cols="40" rows="1"></textarea>
                                            
                                    </div>
                                    <button type="submit"  style="z-index:-1;" class="btn btn-success" >Send</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="ms-3">
                    
                        '. replayfunctions($data['id']) .'
                    
                    </div>
                    

                </div>
            </div>
            ';


        }
    }else{
        return ;
    }
    return $replay;
}

function commentAndReplayTeplat($data){

    global $index;
    $content = $data['content'];
    $comment_thread_id = $data['parant_id'];
    $comment_date = $data['date'];
    $comment_id = $data['id'];
    $comment_user_id = $data['user_id'];
    $posted_userName = $data['user_name'];
    
    // echo all comments 
    $responce =  '
        <div class="row my-4">
            <div class="col-1 text-center">
                <img src="img/userdefault.png" class="rounded" alt="userimg" width="54px">
            </div>
            <div class="col-11 textc">
                <div><b>'. $posted_userName .'</b><small>  | '. dateFormet($comment_date) .' </small></div>
                <p class="text d-inline" id="hp-'. $index .'">'
                . substr($content,0,50) .
                    '<a 
                        style="color:#9e9c9c; cursor:pointer; "
                        class="readmore"
                    >
                        ...read more 
                    </a>
                </p>
                <div class="p-0 moreWords" id="moreW-'. $index . '" style="display: none;">
                    '. substr($content,0) .'
                </div>
                <div class="budget d-flex">
                    <div class="">
                        like
                    </div>
                    <div class="ms-2">
                        <a class="replaybtn" style="cursor:pointer;">REPLAY</a> 
                        <div class="form mt-3" id="replayinput-'. $index .'" style="display:none;">
                            <img src="img/userdefault.png" class="rounded" alt="userimg" width="25px">
                            <form style="display: -webkit-inline-box;" class="d-inline-box" action="'. $_SERVER['REQUEST_URI'] .'" method="post">
                                <div class="input-group mb-3">
                                    <input type="hidden" value="'. $comment_id .'" name="parentComment">
                                        <textarea type="text" class="form-control" name="replay" placeholder="Replay"
                                            aria-label="Replay" aria-describedby="button-addon2" cols="40" rows="1"></textarea>
                                        
                                </div>
                                <button type="submit"  style="z-index:-1;" class="btn btn-success" >Send</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="ms-3">
                
                    '. replayfunctions($comment_id) .'
                
                </div>

            </div>
        </div>
        ';
     
    
    ++$index;

    return $responce;
     

}


?>