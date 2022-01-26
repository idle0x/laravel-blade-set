import { Datepicker } from "vanillajs-datepicker";

const getDatePickerTitle = (elem) => {
  // From the label or the aria-label
  const label = elem.nextElementSibling;
  let titleText = "";
  if (label && label.tagName === "LABEL") {
    titleText = label.textContent;
  } else {
    titleText = elem.getAttribute("aria-label") || "";
  }
  return titleText;
};
const dps = document.querySelectorAll('data-type=["datepicker"]');
if (dps.length) {
  dps.forEach((element) => {
    new Datepicker(element, {
      format: "dd/mm/yyyy",
      title: getDatePickerTitle(element),
    });
  });
}
