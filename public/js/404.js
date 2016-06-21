(function() {
  var backButton = document.getElementById('404-back')
  backButton.onclick = function() {
    history.go(-1)
  }
})()