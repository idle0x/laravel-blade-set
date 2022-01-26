import { DataTable } from "simple-datatables";

let datatable = new DataTable('#datatable', {
  labels: {
    placeholder: "Поиск...", // The search input placeholder
    perPage: "{select} на странице", // per-page dropdown label
    noRows: "Не найдено", // Message shown when there are no records to show
    noResults: "По вашему запросу ничего не найдено", // Message shown when there are no search results
    info: "Показано {start} - {end} из {rows} строк" //
  },
});
