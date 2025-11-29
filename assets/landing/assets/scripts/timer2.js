const defaultEnd = new Date(
    Date.now() + 1000 * 60 * 60 * (Math.random() * 3)
  ).toISOString();
  
  function startTime() {
    const node = document.querySelector("[data-end-time]");
    const endTime = node?.getAttribute("data-end-time") || defaultEnd;
    const endDate = new Date(endTime);
    const currentDate = new Date();
    let diff = endDate.getTime() - currentDate.getTime();
    diff = diff > 0 ? diff : 0;
    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);
    document.querySelectorAll(".timer-day-entry").forEach(elem => {
      elem.innerHTML = days;
    });
    document.querySelectorAll(".timer-hour-entry").forEach(elem => {
      elem.innerHTML = hours;
    });
    document.querySelectorAll(".timer-mins-entry").forEach(elem => {
      elem.innerHTML = minutes;
    });
    document.querySelectorAll(".timer-secs-entry").forEach(elem => {
      elem.innerHTML = seconds;
    });
  }
  
  setInterval(startTime, 1000);
  