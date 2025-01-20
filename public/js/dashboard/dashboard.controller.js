import dashboardService from "./dashboard.service.js";
$(document).ready(function () {
    const dashboardservice = new dashboardService()
    dashboardservice.getAllData();
})
