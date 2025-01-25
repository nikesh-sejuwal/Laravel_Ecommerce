const url = location.pathname;
console.log(url);
const elements = document.querySelectorAll(".navs a");
console.log(elements);
elements.forEach((element) => {
    if (element.getAttribute("href") === url)
        element.classList.add("is-active");
});

// document
//     .querySelector('[data-modal-toggle="crud-modal"]')
//     .addEventListener("click", function () {
//         const modal = document.getElementById("crud-modal");
//         modal.classList.toggle("hidden");
//     });

// document
//     .querySelector('[data-modal-toggle="crud-modal"]')
//     .addEventListener("click", function () {
//         const modal = document.getElementById("crud-modal");
//         modal.classList.toggle("hidden");
//     });

// document
//     .querySelector('[data-modal-toggle="crud-modal"]')
//     .addEventListener("click", function () {
//         const modal = document.getElementById("crud-modal");
//         modal.classList.toggle("hidden");
//     });

// document
//     .querySelector('[data-modal-toggle="crud-modal"]')
//     .addEventListener("click", function () {
//         const modal = document.getElementById("crud-modal");
//         modal.classList.toggle("hidden"); // This will toggle the 'hidden' class on the modal
//     });
