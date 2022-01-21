import "@popperjs/core";
import "bootstrap/dist/js/bootstrap.esm";


window.onload = () => {
  console.log("Test admin");
  const st = document.querySelector(".sidebar__toggler");
  if (st) {
    st.addEventListener('click', (e) => {
      console.log("test");
      const sidebar = document.querySelector(".sidebar");
      sidebar.classList.toggle('compact');
    })
  }
};
