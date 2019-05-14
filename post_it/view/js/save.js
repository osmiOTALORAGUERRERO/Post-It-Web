let btnsSave = document.querySelectorAll('.save')

btnsSave.forEach(function (btnSave) {
  btnSave.addEventListener('click', () => {
    let id = btnSave.previousSibling.previousSibling.value
    let note = document.getElementById(id)
    let title = note.getElementsByClassName('title')[0].value
    let content = note.getElementsByClassName('content')[0].value
    let inpTitle = document.createElement('input')
    inpTitle.setAttribute('type', 'hidden')
    inpTitle.setAttribute('name', 'title')
    inpTitle.setAttribute('value', title)
    let inpContent = document.createElement('input')
    inpContent.setAttribute('type', 'hidden')
    inpContent.setAttribute('name', 'content')
    inpContent.setAttribute('value', content)
    let formSave = note.getElementsByClassName('form-save')[0]
    formSave.appendChild(inpTitle)
    formSave.appendChild(inpContent)
  })
})
