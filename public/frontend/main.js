const heroSwiper = new Swiper(".mySwiper", {
  loop: true,
  pagination: {
    el: ".swiper-pagination",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

const requestsSwiper = new Swiper('.requests-swiper', {
  loop: true,
  slidesPerView: 4,
  // spaceBetween: 0,
  freeMode: true,
  navigation: {
    nextEl: '.requests-button-next',
    prevEl: '.requests-button-prev',
  },
  breakpoints: {
    0: { slidesPerView: 1 },
    576: { slidesPerView: 2 },
    992: { slidesPerView: 3 },
    1200: { slidesPerView: 4 },
  }
});

const offersSwiper = new Swiper('.offers-swiper', {
  loop: true,
  slidesPerView: 4,
  freeMode: true,
  navigation: {
    nextEl: '.offers-button-next',
    prevEl: '.offers-button-prev',
  },
  breakpoints: {
    0: { slidesPerView: 1 },
    576: { slidesPerView: 2 },
    992: { slidesPerView: 3 },
    1200: { slidesPerView: 4 },
  }
});
document.addEventListener('DOMContentLoaded', () => {
  const mainImage = document.getElementById('main-product-image');
  const thumbnails = document.querySelectorAll('.thumbnail-item');

  // Initialize Swiper.js for thumbnails
  const thumbnailSwiper = new Swiper('.product-thumbnails-swiper', {
      loop: false,
      slidesPerView: 4,
      spaceBetween: 10,
      freeMode: true,
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      breakpoints: {
          // Mobile (less than 576px)
          0: {
              slidesPerView: 1,
              spaceBetween: 5
          },
          // Tablet (576px and up)
          576: {
              slidesPerView: 3,
              spaceBetween: 7
          },
          // Desktop (992px and up)
          992: {
              slidesPerView: 4,
              spaceBetween: 7
          }
      }
  });

  // Image switching logic (unchanged from previous response)
  thumbnails.forEach(thumbnail => {
      thumbnail.addEventListener('click', () => {
          // Remove 'active' class from all thumbnails
          thumbnails.forEach(item => item.classList.remove('active'));
          // Add 'active' class to the clicked thumbnail
          thumbnail.classList.add('active');

          // Get the source from the data-src attribute and update the main image
          const newImageSrc = thumbnail.getAttribute('data-src');
          mainImage.src = newImageSrc;
      });
  });
});
// هذا الكود يجعل أيقونة القلب تتفاعل عند الضغط عليها
document.querySelectorAll(".heart").forEach(heart => {
  heart.addEventListener("click", () => {
    heart.classList.toggle("active");
  });
});


// هذا الكود يجعل أيقونة القلب تتفاعل عند الضغط عليها
document.querySelectorAll(".heart").forEach((heart) => {
  heart.addEventListener("click", () => {
    heart.classList.toggle("active");
  });
});

function toggleMenu() {
  var menu = document.getElementById("mobile-menu");
  if (menu.classList.contains("open")) {
    menu.classList.remove("open");
  } else {
    menu.classList.add("open");
  }
}


// ابحث عن عنصر رفع الملفات والحاوية الجديدة لعرض الأسماء
const fileInput = document.getElementById('cart_images');
const fileNamesDisplay = document.getElementById('file-names-display');

// استمع لحدث "change" عندما يتم اختيار ملفات جديدة
fileInput.addEventListener('change', (event) => {
    const files = event.target.files;

    // امسح أي أسماء ملفات سابقة
    fileNamesDisplay.innerHTML = '';

    if (files.length > 0) {
        const fileList = document.createElement('ul');
        fileList.style.listStyleType = 'none'; // لإزالة النقاط
        fileList.style.padding = '0';

        for (const file of files) {
            const listItem = document.createElement('li');
            listItem.textContent = file.name; // هذا السطر هو الأهم: يأخذ اسم الملف
            fileList.appendChild(listItem);
        }

        fileNamesDisplay.appendChild(fileList);
    }
});
