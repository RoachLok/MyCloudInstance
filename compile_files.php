<?php 
    require_once('db.php');

    if (isset($_POST)) {
        $data = json_decode(file_get_contents('php://input'), true);

        $db = getDB();
        if (count($data) > 0) {
            $uname = $data[0]['uname'];
            foreach ($data as $row) { 
                $tabTitle    = $row['tabTitle'];
                $content     = $row['content'];
                
                //shell_exec('python file_writer.py "'.$uname.'" "'.$tabTitle.'" "'.$content.'"');
                //shell_exec('mkdir /tmp/"'.$uname.'"');
                //shell_exec('cat /tmp/"'.$uname.'"/hello.txt > /tmp/"'.$uname.'"/"'.$tabTitle.'"');
                //shell_exec('chmod 7777 /tmp/"'.$uname.'"/"'.$tabTitle.'"');
                
                //shell_exec('chmod 7777 /tmp/"'.$tabTitle.'"');
                //file_put_contents ('/tmp/'.$uname.'/'.$tabTitle , $content);
                shell_exec('bash | mkdir "'.$uname.'"');
                file_put_contents ('./'.$uname.'/'.$tabTitle , $content);
                sleep(0.3);
            }
        }

        $contentType = $data[0]['contentType'];

        if ($contentType == 'c_cpp') {
            $compile_command = 'bash | g++ "'.$uname.'"/*.c* -o "'.$uname.'".exe';
            $run_command = '"'.$uname.'".exe';
        } else {
            $compile_command = 'javac "'.$uname.'"/*.jav*';
            $run_command = 'java "'.$uname.'"/*.class';
        }

        $result_code = null;
        $output      = null;
       // exec ($compile_command , $output, $result_code);
        exec($compile_command, $output, $result_code);
        echo "    Ran command: ".$compile_command." \n";
        echo "            Returned with status ". $result_code." and output:\n\n";
        foreach ($output as $row) { 
            echo "              ".$row."\n";
        }

        echo "            Ran command: ".$run_command."\n";
        exec ($run_command , $output, $result_code);
        echo "                Output:\n";

        foreach ($output as $row) { 
            echo "              ".$row."\n";
        }

        //shell_exec('rm -r /tmp/"'.$uname.'"/*');
        //shell_exec('rm -r /tmp/*.cpp');
        //shell_exec('rm -r /tmp/a.out');
        //$clean_command = 'rm -f "'.$uname.'"/*.cpp';
        function rrmdir($dir) {
            if (is_dir($dir)) {
              $objects = scandir($dir);
              foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                  if (filetype($dir."/".$object) == "dir") 
                     rrmdir($dir."/".$object); 
                  else unlink   ($dir."/".$object);
                }
              }
              reset($objects);
              rmdir($dir);
            }
        }
        rrmdir('./'.$uname);
    }
?>
