var ProjectContent = function (win, doc) {
  "use strict";
  var DATA_REFRESH_COMPLETE = "data_refresh_complete",
      banners_SWF = [],
      banners_IMG = [],
      documents = [];

  function parseData(data){
    
    for(var i = 0; i < data.length; i +=1){

      if(data[i].toLowerCase().indexOf('.swf') != -1){
        banners_SWF.push(buildLink(data[i], 'swf'));
      }
      if(data[i].toLowerCase().indexOf('.jpg') != -1 || data[i].toLowerCase().indexOf('.jpeg') != -1 || data[i].toLowerCase().indexOf('.gif') != -1 || data[i].toLowerCase().indexOf('.png') != -1){
        banners_IMG.push(buildLink(data[i], 'img'));
      }
      if(data[i].toLowerCase().indexOf('.pdf') != -1 || data[i].toLowerCase().indexOf('.ppt') != -1 || data[i].toLowerCase().indexOf('.pptx') != -1 || data[i].toLowerCase().indexOf('.doc') != -1 || data[i].toLowerCase().indexOf('.docx') != -1 || data[i].toLowerCase().indexOf('.xls') != -1 || data[i].toLowerCase().indexOf('.xlsx') != -1){
        documents.push(buildLink(data[i], 'doc'));
      }
    }
  }

  function buildLink(_fileName, _type){
    var outputLinkContainer = document.createElement('p');
    var outputLink = document.createElement('a');
    var outputDeleteLinkContainer = document.createElement('span');
    var outputDeleteLink = document.createElement('a');
    outputLink.href = "uploads/"+_fileName;
    $(outputLink).html(_fileName);
    $(outputLink).addClass('assetLink');
    $(outputLink).addClass(_type);
    $(outputDeleteLink).attr('href', _fileName);
    $(outputDeleteLink).html("DELETE");
    $(outputDeleteLink).addClass('deleteButton');
    $(outputDeleteLinkContainer).addClass('edit-del');
    $(outputLinkContainer).append(outputLink);
    $(outputLinkContainer).append(outputDeleteLinkContainer);
    $(outputDeleteLinkContainer).append("[ ").append($(outputDeleteLink)).append(" ]");
    
    return outputLinkContainer;
  }

  function refresh(projectContentPath){
    banners_SWF.length = 0;
    banners_IMG.length = 0;
    documents.length = 0;

    $.ajax({
      type: "POST",
      url: "/_services/getuploadslist.php",
      data: {pathToContent: projectContentPath},
      context: document.body
    }).done(function(data) {
      parseData(data);
      $(document).trigger(DATA_REFRESH_COMPLETE);
    });
  }

  return {
    DATA_REFRESH_COMPLETE: DATA_REFRESH_COMPLETE,
    refresh: refresh,
    banners_SWF: banners_SWF,
    banners_IMG: banners_IMG,
    documents: documents
  };
}(window, document);
