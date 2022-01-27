import "@popperjs/core";
import "bootstrap/dist/js/bootstrap.esm";


window.onload = () => {
  const st = document.querySelector('#sidebarToggler');
  if (st) {
    st.addEventListener('click', (e) => {
      const wrapper = document.querySelector("#wrapper");
      if (wrapper) {
        if (window.innerWidth <= 992) {
          wrapper.classList.toggle('sidebar-show');
        } else {
          wrapper.classList.toggle('sidebar-hide');
        }
      }
    })
  }
};
