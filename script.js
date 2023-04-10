"use strict";

const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const btnCloseModel = document.querySelector(".close-modal");
const btnOpenModel = document.querySelectorAll(".show-modal");

const closeModal = function () {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
};

const showModal = function () {
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

for (let i = 0; i < btnOpenModel.length; i++) {
  btnOpenModel[i].addEventListener("click", function () {
    showModal();
  });

  btnCloseModel.addEventListener("click", function () {
    closeModal();
  });
}

overlay.addEventListener("click", function () {
  closeModal();
});

// <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
// <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download</td>
