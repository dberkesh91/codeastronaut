$(document).ready(function(){

  var app = {
    name: 'planetdev',
    protocol: 'http',
    host: window.location.host,
    messages: {
      searchError: "Sorry, we couldn't find results \n for your search term"
    }
  };

  var form = $('#searchForm');
  var searchDropdown = $('#searchDropdown');
  var resultBox = $('#searchResult');
  var mainContent = $('#main-content');

  searchDropdown3.on("change", function(ev){
    //ev.preventDefault();
    //var searchedTag = $(this).find(":selected").last().text();
    var searchedTags = [];
    $(this).find(":selected").each(function(index, searchedTag){
      var searchedTag = $(searchedTag).text();
      searchedTags.push(searchedTag);
    });

    $.ajax({
      type: "get",
      url: window.location.protocol + '://' + app.host + '/' + app.name + '/index.php/search',
      cache: false,
      data: {searchedTags: searchedTags},
      success: function(result)
      {
        var result = JSON.parse(result);

        if (result.length > 0)
        {
          populatePage(result);
        } else {
          mainContent.empty();
          mainContent.append(app.messages.searchError);
        }

      },
      error: function()
      {

      }
    });
  });

  function populatePage(objects)
  {
    var numOfObjects = objects.length;
    mainContent.empty();

    for (var i = 0; i < numOfObjects; i++)
    {
      mainContent.append
      (
        "<div class='excerpt'>\
          <h1>" + objects[i].title + "</h1>\
          <p>" + objects[i].description + "</p>\
          <span>" + objects[i].created + "</span>\
        </div>"
      );
    }

  }

});
