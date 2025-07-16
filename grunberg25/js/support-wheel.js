document.addEventListener("DOMContentLoaded", () => {
  const segments = document.querySelectorAll(".segment");
  const description = document.getElementById("wheel-description");

  const descriptions = [
    "Full study support to Apprenticeship programme for new trainees or those part way through their studies",
    "Monthly in-house accounts and tax training",
    "Quarterly in-house Accounts and Tax CPD training",
    "ACA training firm. ACCA platinum training provider. AA training provider",
    "Buddy system for all new joiners",
    "Staff feedback forum",
    "Structured in-house professional development training to help you reach your potential",
    "Partner mentors chosen by you",
    "Employee Assistance Programme Mental Health First Aiders",
    "Technical and personal development training",
    "Mentor system for new trainees",
  ];

  const totalSegments = 11;
  const degreesPerSegment = 360 / totalSegments;
  let currentIndex = 0;
  let autoRotate;
  const visualOffset = 9;

  function rotateTo(index) {
    const rotation = -(index * degreesPerSegment);
    document.getElementById(
      "rotating-container"
    ).style.transform = `rotate(${rotation}deg)`;
    description.textContent = descriptions[index];
    currentIndex = index;
  }

  function handleSegmentClick(clickedIndexRaw) {
    stopAutoRotate();

    const clickedIndex =
      (clickedIndexRaw - visualOffset + totalSegments) % totalSegments;

    let stepsForward =
      (clickedIndex - currentIndex + totalSegments) % totalSegments;
    let targetIndex = (currentIndex + stepsForward) % totalSegments;

    rotateTo(targetIndex);
    startAutoRotate();
  }

  function startAutoRotate() {
    autoRotate = setInterval(() => {
      let nextIndex = (currentIndex + 1) % totalSegments;
      rotateTo(nextIndex);
    }, 4000);
  }

  function stopAutoRotate() {
    clearInterval(autoRotate);
  }

  segments.forEach((segment) => {
    segment.addEventListener("click", () => {
      const rawIndex = parseInt(segment.dataset.index);
      handleSegmentClick(rawIndex);
    });
  });

  startAutoRotate();
});
