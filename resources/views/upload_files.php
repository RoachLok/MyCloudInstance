<?php 
    require_once('db.php');

    if (isset($_POST)) {
        $data = json_decode(file_get_contents('php://input'), true);

        $db = getDB();
        if (count($data) > 0) {
            foreach ($data as $row) { 
                $tabTitle    = $row['tabTitle'];
                $uname       = $row['uname'];
                $contentType = $row['contentType'];
                $content     = $row['content'];

                $st = $db->prepare("INSERT INTO mycloud.tabs(tabTitle,uname,contentType,content) VALUES(:tabTitle, :uname, :contentType, :content);");
                $st->bindParam(':tabTitle'      ,$tabTitle      );
                $st->bindParam(':uname'         ,$uname         );
                $st->bindParam(':contentType'   ,$contentType   );
                $st->bindParam(':content'       ,$content       );

                $st->execute();
            }
        }
    }
?>
