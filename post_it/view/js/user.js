
function newNote () {
  $.ajax({
    data: { function: 'newNote' },
    url: 'component/scripts.php',
    type: 'POST',
    success: function (res) {
      window.alert(res)
      // $('.notes').html(res)
    }
  })
}
