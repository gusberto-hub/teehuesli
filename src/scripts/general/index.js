// Get all the elements you want to show on scroll
const targets = document.querySelectorAll(".js-show-on-scroll");

// Callback for IntersectionObserver
const callback = function(entries) {
    entries.forEach(entry => {
        const animationType = entry.target.dataset.animateType;
        if (entry.isIntersecting) {
        //   entry.target.classList.add(animationType);
      }
    });
  };

// Set up a new observer
const observer = new IntersectionObserver(callback);

// Loop through each of the target
targets.forEach(function(target) {
  // Hide the element
//   target.classList.add("opacity-0");

  // Add the element to the watcher
  observer.observe(target);
});