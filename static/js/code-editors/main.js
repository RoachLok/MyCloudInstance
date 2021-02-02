// Source: http://jsfiddle.net/vinodlouis/pb6EM/1/ 
var currentTab;
var composeCount = 0;
//initilize tabs
$(function() {
  registerComposeButtonEvent();
  registerCloseEvent();
});

//this method will demonstrate how to add tab dynamically
function registerComposeButtonEvent() {
  /* just for this demo */
  $('#composeButton').click(function(e) {
    e.preventDefault();

    var tabId = "New_" + composeCount; //this is id on tab content div where the 
    composeCount = composeCount + 1; //increment compose count

    
    $('.nav-tabs').append(` <li class="nav-item">
                              <a name="code-tab" class="nav-link" data-toggle="tab" contenteditable="true" href="#` + tabId + `" role="tab" aria-selected="false" >`+ tabId +`<button class="close closeTab tab-icon pl-3" type="button" >×</button></a>
                            </li>`);
    
    $('#frames-container').append(`<iframe id="${tabId}" class="code-frame tab-pane fade" role="tabpanel" src="./editor.php?tab&tabId=3&contentType=c_cpp"></iframe>`);

    $(this).tab('show');

    showTab(tabId);
    registerCloseEvent(); 
    //$('#'+ tabId).trigger('click');
  });

  $('#composeButton-java').click(function(e) {
    e.preventDefault();

    var tabId = "New_" + composeCount; //this is id on tab content div where the 
    composeCount = composeCount + 1; //increment compose count

    $('.nav-tabs').append(` <li class="nav-item">
                              <a name="code-tab" class="nav-link" data-toggle="tab" contenteditable="true" href="#` + tabId + `" role="tab" aria-selected="false" >`+ tabId +`<button class="close closeTab tab-icon pl-3" type="button" >×</button></a>
                            </li>`);
    
    $('#frames-container').append(`<iframe id="${tabId}" class="code-frame tab-pane fade" role="tabpanel" src="./editor.php?tab&tabId=10&contentType=java"></iframe>`);

    $(this).tab('show');

    showTab(tabId);
    registerCloseEvent(); 
    //$('#'+ tabId).trigger('click');
  });
}

//this method will register event on close icon on the tab..
function registerCloseEvent() {

  $(".closeTab").click(function() {
    //there are multiple elements which has .closeTab icon so close the tab whose close icon is clicked
    var tabContentId = $(this).parent().attr("href");
    $(this).parent().parent().remove(); //remove li of tab
    $('#myTab a:last').tab('show'); // Select first tab
    $(tabContentId).remove(); //remove respective tab content

  });
}

//shows the tab with passed content div id..paramter tabid indicates the div where the content resides
function showTab(tabId) {
  $('#myTab a[href="#' + tabId + '"]').tab('show');
}
//return current active tab
function getCurrentTab() {
  return currentTab;
}

//this will return element from current tab
//example : if there are two tabs having textarea with same id or same class name then when $("#someId") whill return both the text area from both tabs
//to take care this situation we need get the element from current tab.
function getElement(selector) {
  var tabContentId = $currentTab.attr("href");
  return $("" + tabContentId).find("" + selector);

}

function removeCurrentTab() {
  var tabContentId = $currentTab.attr("href");
  $currentTab.parent().remove(); //remove li of tab
  $('#myTab a:last').tab('show'); // Select first tab
  $(tabContentId).remove(); //remove respective tab content
}

function loadExistingTab(tabId, tabTitle) {
  let tabTitle_clean = tabTitle.replace('.', '');

  let contentType = 'c_cpp';
  if (tabTitle_clean.endsWith('java')) {
    contentType = 'java';
  }

  let id = (tabTitle_clean + tabId).replaceAll(' ', '');
  $('.nav-tabs').append(` <li class="nav-item"> 
  <a name="code-tab" class="nav-link" data-toggle="tab" href="#` + id + `" role="tab" aria-selected="false" >`+ tabTitle +`<button class="close closeTab tab-icon pl-3" type="button">×</button></a>
  </li>`);


  $('#frames-container').append(`<iframe id="${id}" class="code-frame tab-pane fade" role="tabpanel" src="./editor.php?tab&tabId=${tabId}&contentType=${contentType}"></iframe>`);


  showTab(id);
  registerCloseEvent();
}

function uploadFiles(username, contentType) {
  let iframes = document.getElementsByTagName('iframe');
  let tabs    = document.getElementsByName('code-tab');

  let tab_title = '';
  let texts = [];
  for (iframe of iframes) {
    tab_title = tabs[texts.length].innerText
    texts.push({
      tabTitle      :  tab_title.substring(0, tab_title.length-2),
      uname         :  username,
      contentType   :  contentType,
      content       :  iframe.contentWindow.getEditorText()
    });
  }

  // Create a request variable and assign a new XMLHttpRequest object to it.
  const request = new XMLHttpRequest();

  // Open a new connection, using the POST request on the URL endpoint.
  request.open('POST', './upload_files.php', true);

  request.onload = function () {  // Process response somehow // A json can also be retrieved. 
    console.log(this.response);
  }

  // Send request
  request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  request.send(JSON.stringify(texts));
}

function compileFiles(username, contentType) {
  let iframes = document.getElementsByTagName('iframe');
  let tabs    = document.getElementsByName('code-tab');

  let tab_title = '';
  let texts = [];
  for (iframe of iframes) {
    tab_title = tabs[texts.length].innerText
    texts.push({
      tabTitle      :  tab_title.substring(0, tab_title.length-2),
      uname         :  username,
      contentType   :  contentType,
      content       :  iframe.contentWindow.getEditorText()
    });
  }

  // Create a request variable and assign a new XMLHttpRequest object to it.
  const request = new XMLHttpRequest();

  // Open a new connection, using the POST request on the URL endpoint.
  request.open('POST', './compile_files.php', true);

  request.onload = function () {  // Process response somehow // A json can also be retrieved. 
    let output_container = document.getElementById('output-container');
    output_container.innerHTML += this.response;
  }

  // Send request
  request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  request.send(JSON.stringify(texts));
}