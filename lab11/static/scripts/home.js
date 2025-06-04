document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("div.post__slider").forEach((slider) => {
    const slides = slider.querySelectorAll("div.post__slide");
    if (slides.length <= 1) return;

    const prevBtn = slider.querySelector("button.post__slider-button--prev");
    const nextBtn = slider.querySelector("button.post__slider-button--next");
    const currentSlide = slider.querySelector("span.current-slide");

    slider.dataset.currentIndex = "0";

    function updateSlider() {
      const currentIndex = parseInt(slider.dataset.currentIndex);
      slides.forEach((slide, index) => {
        slide.classList.toggle("active", index === currentIndex);
      });
      if (currentSlide) currentSlide.textContent = currentIndex + 1;
    }

    if (prevBtn && nextBtn) {
      prevBtn.addEventListener("click", (e) => {
        e.preventDefault();
        let currentIndex = parseInt(slider.dataset.currentIndex);
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        slider.dataset.currentIndex = currentIndex;
        updateSlider();
      });

      nextBtn.addEventListener("click", (e) => {
        e.preventDefault();
        let currentIndex = parseInt(slider.dataset.currentIndex);
        currentIndex = (currentIndex + 1) % slides.length;
        slider.dataset.currentIndex = currentIndex;
        updateSlider();
      });
    }

    // Клик по картинке — только открытие модалки!
    slides.forEach((slide, index) => {
      slide.addEventListener("click", () => {
        openModal(slider.id, parseInt(slider.dataset.currentIndex));
      });
    });

    updateSlider();
  });

  // Всё ниже — если у тебя есть ещё фичи типа "ещё" и разворачивания текста:
  document.querySelectorAll("a.post__more-link").forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      toggleText(this);
    });
  });
  initTextCollapsing();
});

// --- Можно также оставить функции для "ещё"/"свернуть", если они используются ---
function initTextCollapsing() {
  document.querySelectorAll("p.post__text").forEach((textElement) => {
    const post = textElement.closest("article.post");
    const moreLink = post.querySelector("a.post__more-link");

    if (textElement.scrollHeight > textElement.clientHeight) {
      moreLink.style.display = "block";
    }
  });
}

function toggleText(button) {
  const post = button.closest("article.post");
  const textElement = post.querySelector("p.post__text");
  const moreText = post.querySelector("p.post__more-text");

  if (textElement.classList.contains("collapsed")) {
    textElement.classList.remove("collapsed");
    moreText.textContent = "свернуть";
    button.dataset.action = "collapse";
  } else {
    textElement.classList.add("collapsed");
    moreText.textContent = "ещё";
    button.dataset.action = "expand";
  }
}
