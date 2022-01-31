const searchBar = document.querySelector(".users .search input"),
seatchBtn = document.querySelector(".users .search button");

seatchBtn.onclick=()=>{
	searchBar.classList.toggle("active");
	searchBar.focus();
	seatchBtn.classList.toggle("active");
}