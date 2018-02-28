$(document).ready(function(){

  var app = {
    name: 'codeastronaut.local',
    protocol: 'http',
    host: window.location.host,
    messages: {
      searchError: "Sorry, we couldn't find results \n for your search term"
    }
  };

  var form = $('#searchForm');
  var searchDropdown = $('#searchDropdown');
  var resultBox = $('#search-result');

  searchDropdown.on("change", function(ev){
    ev.preventDefault();
    //var searchedTag = $(this).find(":selected").last().text();
    var searchedTags = [];
    $(this).find(":selected").each(function(index, searchedTag){
      var searchedTag = $(searchedTag).text();
      searchedTags.push(searchedTag);
    });

    $.ajax({
      type: "get",
      url: 'http://codeastronaut.local/articles',
      cache: false,
      data: {searchedTags: searchedTags},
      success: function(result)
      {
        var result = JSON.parse(result);

        if (result.length > 0)
        {
          populatePage(result);
        } else {
          resultBox.empty();
          resultBox.append(app.messages.searchError);
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
    resultBox.empty();

    for (var i = 0; i < numOfObjects; i++)
    {
      resultBox.append
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
