import Litepicker from "litepicker";

// const getDatePickerTitle = (elem) => {
//   // From the label or the aria-label
//   const label = elem.nextElementSibling;
//   let titleText = "";
//   if (label && label.tagName === "LABEL") {
//     titleText = label.textContent;
//   } else {
//     titleText = elem.getAttribute("aria-label") || "";
//   }
//   return titleText;
// };

new Litepicker({
  element: document.querySelector('input[data-type="datepicker"]'),
  allowRepick: true,
  singleMode: false,
  format: 'DD.MM.YYYY',
});
