const form = document.querySelector(".login form")
const continueButton = document.querySelector(".login input[type='submit']")
const error = document.querySelector(".error-txt")

form.onsubmit = (e) => {
  e.preventDefault()
}

continueButton.onclick = () => {
  let xhr = new XMLHttpRequest()

  xhr.open("POST", "../php-files/api/login.php", true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response
        if (data == "success") {
          location.href = "users.php"
        } else {
          error.textContent = data
          error.style.display = "block"
        }
      }
    }
  }
  let formData = new FormData(form)
  xhr.send(formData)
}
