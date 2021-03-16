const search = document.querySelector(".users .search input")
const searchButton = document.querySelector(".users .search button")

searchButton.onclick = () => {
  search.classList.toggle("active")
  searchButton.classList.toggle("active")
  search.focus()
}
