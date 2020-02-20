let inpColors = document.querySelectorAll('.color')

inpColors.forEach(function(color){
    color.addEventListener('change', () => {
        let id = color.parentNode.parentNode.id
        let note = document.getElementById(id)
        note.style.backgroundColor = color.value
    })
})
