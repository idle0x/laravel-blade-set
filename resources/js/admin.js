import "@popperjs/core";
import "bootstrap/dist/js/bootstrap.esm";


window.onload = () => {
  const sideBorder = document.querySelector(".sidebar .sidebar__border");
  if (sideBorder) {
    sideBorder.addEventListener('mousedown', (e) => {
      e.preventDefault()
      window.addEventListener('mousemove', resize)
      window.addEventListener('mouseup', stopResize)
    })
  }
};

function resize(e) {
  const sidebar = document.querySelector('.sidebar')
  if (sidebar) {
    sidebar.style.width = e.pageX - sidebar.getBoundingClientRect().left + 'px';
    if (sidebar.offsetWidth <= 50) {
      sidebar.style.width = "50px";
    }
    if (sidebar.offsetWidth > 800) {
      sidebar.style.width = "800px";
    }
  }
}

function stopResize() {
  window.removeEventListener('mousemove', resize)
}
