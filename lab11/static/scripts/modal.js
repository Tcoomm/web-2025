let currentModalImages = [];
let currentModalIndex = 0;
let activePostSlider = null;

function openModal(sliderId, activeIndex) {
    const slider = document.getElementById(sliderId);
    if (!slider) return;

    const slides = slider.querySelectorAll("div.post__slide");
    const images = Array.from(slides).map(
        (slide) => slide.querySelector("img").src
    );

    activePostSlider = slider;
    const prevBtn = slider.querySelector("button.post__slider-button--prev");
    const nextBtn = slider.querySelector("button.post__slider-button--next");
    const indicator = slider.querySelector("div.post__slider-indicator");

    if (prevBtn) prevBtn.style.display = "none";
    if (nextBtn) nextBtn.style.display = "none";
    if (indicator) indicator.style.display = "none";

    const modal = document.getElementById("imageModal");
    const modalSlider = modal.querySelector("div.modal__slider");
    const modalCurrentSlide = modal.querySelector("span#modalCurrentSlide");
    const modalTotalSlides = modal.querySelector("span#modalTotalSlides");

    modalSlider.innerHTML = "";

    images.forEach((imgSrc, index) => {
        const slide = document.createElement("div");
        slide.className = `modal__slide ${index === activeIndex ? "active" : ""}`;
        slide.innerHTML = `<img src="${imgSrc}" alt="Увеличенное изображение поста" />`;
        modalSlider.appendChild(slide);
    });

    modalTotalSlides.textContent = images.length;
    modalCurrentSlide.textContent = activeIndex + 1;
    currentModalImages = images;
    currentModalIndex = activeIndex;
    modal.style.display = "flex";
    document.body.style.overflow = "hidden";
}

function closeModal() {
    const modal = document.getElementById("imageModal");
    modal.style.display = "none";
    document.body.style.overflow = "auto";

    if (activePostSlider) {
        const prevBtn = activePostSlider.querySelector(
            "button.post__slider-button--prev"
        );
        const nextBtn = activePostSlider.querySelector(
            "button.post__slider-button--next"
        );
        const indicator = activePostSlider.querySelector("div.post__slider-indicator");

        if (prevBtn) prevBtn.style.display = "block";
        if (nextBtn) nextBtn.style.display = "block";
        if (indicator) indicator.style.display = "flex";

        activePostSlider = null;
    }
}

function navigateModalSlide(direction) {
    const slides = document.querySelectorAll("div.modal__slide");
    if (slides.length === 0) return;

    const newIndex =
        (currentModalIndex + direction + slides.length) % slides.length;

    slides[currentModalIndex].classList.remove("active");
    slides[newIndex].classList.add("active");
    currentModalIndex = newIndex;
    document.querySelector("span#modalCurrentSlide").textContent = newIndex + 1;
}

// Подключаем обработчики только если есть модалка на странице
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("imageModal");
    if (!modal) return;

    const prevBtn = modal.querySelector("button.modal__slider-button--prev");
    const nextBtn = modal.querySelector("button.modal__slider-button--next");
    const closeBtn = modal.querySelector("button.modal__close");

    if (prevBtn) {
        prevBtn.addEventListener("click", function (e) {
            e.preventDefault();
            navigateModalSlide(-1);
        });
    }
    if (nextBtn) {
        nextBtn.addEventListener("click", function (e) {
            e.preventDefault();
            navigateModalSlide(1);
        });
    }
    if (closeBtn) {
        closeBtn.addEventListener("click", closeModal);
    }

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape" && modal.style.display === "flex") {
            closeModal();
        }
    });
});
