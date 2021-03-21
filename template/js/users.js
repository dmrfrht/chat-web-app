const search = document.querySelector(".users .search input")
const searchButton = document.querySelector(".users .search button")
const usersList = document.querySelector(".users .users-list")

searchButton.onclick = () => {
  search.classList.toggle("active")
  searchButton.classList.toggle("active")
  search.focus()
  search.value = ""
}

search.onkeyup = () => {
  let searchTerm = search.value
  if (searchTerm != "") {
    search.classList.add("active")
  } else {
    search.classList.remove("active")
  }
  let xhr = new XMLHttpRequest()

  xhr.open("POST", "../php-files/api/search.php", true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response
        usersList.innerHTML = data
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  xhr.send("searchTerm=" + searchTerm)
}

setInterval(() => {
  let xhr = new XMLHttpRequest()

  xhr.open("GET", "../php-files/api/users.php", true)
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response
        if (!search.classList.contains("active")) {
          usersList.innerHTML = data
        }
      }
    }
  }
  xhr.send()
}, 500)
