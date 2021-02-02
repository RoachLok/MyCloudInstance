<?php
    if (isset($_GET['tab'])) {
        $tabId       = $_GET['tabId'];
        $contentType = $_GET['contentType'];
        require_once('db.php');
        include ('userclass.php');
        if ($hide == 0) {
            $userClass = new userClass();
            $userDetails=$userClass->userDetails($session_id);
            $user= $userDetails->username;
            // Database Query for tabs
            $db = getDB();
            $st = $db->prepare("SELECT * FROM tabs WHERE tabid=:tabid;"); 
            $st->bindParam("tabid",$tabId,PDO::PARAM_STR) ; //tabId bind
            $st->execute();
            $data = $st->fetchall(PDO::FETCH_ASSOC);
        }
    } else {
        if ($hide == 0) {
            echo "helo";
            require_once('db.php');
            $st = $db->prepare("SELECT * FROM tabs WHERE tabid=:tabid;"); 
            $st->bindParam("tabid",$tabId,PDO::PARAM_STR) ; //tabId bind
            $st->execute();
            $data = $st->fetchall(PDO::FETCH_ASSOC);
        }
    }
?>    

<style type="text/css" media="screen">
    #editor { 
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>

<div id="editor">
<?php
    echo $data[0]['content'];
?>
</div>

<script src="./src-min/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="./src-min/ext-language_tools.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/dracula");
    <?php  echo 'editor.session.setMode("ace/mode/'.$data[0]['contentType'].'");' ?>
    editor.setOptions({
        enableBasicAutocompletion: true
    });
</script> 
<script>
    function changeTheme(theme) {
        if (theme)
            editor.setTheme("ace/theme/"+theme);
        else
            editor.setTheme();
    }

    function getEditorText() {
        return editor.getValue();
    }

    function getEditorMode() {
        return editor.getSession().getMode().$id;
    }
</script>