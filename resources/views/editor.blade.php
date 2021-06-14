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
#include &lt;iostream&gt;
#include &lt;string&gt;
using namespace std;

int main() {
    string food = "Pizza";  // Variable declaration
    string* ptr = &food;    // Pointer declaration

    // Reference: Output the memory address of food with the pointer
    cout << ptr << "\n";

    // Dereference: Output the value of food with the pointer
    cout << *ptr << "\n";
    return 0;
}
</div>

<script src="./static/js/src-min/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="./static/js/src-min/ext-language_tools.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/dracula");
    editor.session.setMode("ace/mode/c_cpp");
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