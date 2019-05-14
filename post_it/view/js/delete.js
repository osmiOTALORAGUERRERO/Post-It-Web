$(document).ready(function () {
  $('.form-delete').submit(function (e) {
    let func = { function: 'delete' }
    let data = $(this).serialize() + '&' + $.param(func)
    $.ajax({
      data: data,
      url: 'index.php',
      type: 'POST',
      success: function (res) {
        var jsonData = JSON.parse(res)
        if (jsonData.success) {
          let note = document.getElementById(jsonData.idNote)
          let parent = note.parentNode
          parent.removeChild(note)
        } else {
          window.alert('Error al eliminar la nota')
        }
      }
    })
    return false
  })
})
