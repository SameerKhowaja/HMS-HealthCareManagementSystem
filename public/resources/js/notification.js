const checkboxes = document.querySelectorAll('.checkbox')
const rows = document.querySelectorAll('.row')
const actionButtons = document.querySelector('.action-buttons')

const toggleSelectedStyle = () => {
  checkboxes.forEach((e, i) => {
    e.addEventListener('change', () => {
      rows[i].classList.toggle('selected')
      toggleActionButtons()
    })
  })
}

const valueChanged = () => {
  toggleSelectedStyle()
  toggleActionButtons()
}

const toggleActionButtons = () => {
  let checkboxesArr = Array.from(checkboxes)
  let value = checkboxesArr.some((e) => (e.checked))
  if(value === false) {
    actionButtons.classList.add('hidden')
  } else {
    actionButtons.classList.remove('hidden')
  }
}

valueChanged()