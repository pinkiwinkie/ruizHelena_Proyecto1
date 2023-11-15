const toggler = document.querySelector(".btn");
toggler.addEventListener("click", () => {
    document.querySelector("#sidebar").classList.toggle("collapsed");
})

document.querySelector('.close-button').addEventListener('click', function() {
    document.querySelector("#sidebar").classList.toggle("collapsed");
});