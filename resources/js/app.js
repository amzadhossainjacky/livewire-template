/* Global images declare */
import.meta.glob(["../images/**"]);

/* sweet alert */
import Swal from "sweetalert2";

window.Swal = Swal;

/** Jquery */
import jQuery from "jquery";
window.jQuery = jQuery;
window.$ = jQuery;

/* Config */
import "./backend/config";

/* simplebar */
import "./backend/simplebar.min";

/* feather */
// import  "./backend/feather";

/* frostui */
import "./backend/frostui";

/* App */
import "./backend/app";

/* chart */
/* import Chart from 'chart.js';
window.Chart = new Chart; */

import Chart from "chart.js/auto";
window.Chart = Chart;

/* chart */
// import Highcharts from "highcharts";
// window.Highcharts = Highcharts;

import ApexCharts from "apexcharts";
window.ApexCharts = ApexCharts;

// /* dashboard */
/* import "./backend/dashboard"; */

/** Broadcasting */
import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});
/* Alpine */
// import Alpine from "alpinejs";

// window.Alpine = Alpine;

// Alpine.start();

/** Summernote Editor  */
// import "./backend/summernote-lite.min.js";
// window.Note = Note;
