
/*
 * Used to update the solar display found inside the footer of the page, this
 * function rounds up so we always start at 1%
 * @param {type} todaysWatts The total wattage generated today
 * @param {type} elemID the element id which is to be updated
 * @returns {undefined}
 */
function updateSolarDisplay(todaysWatts, elemID) {
    var elem = document.getElementById(elemID);
    var dailyUsage = 356000;//Farmer Cooksey should change this to whatever his sensors wattage takes
    var percentageOfGoal = (todaysWatts / dailyUsage) * 100;
    var percent = 1;
    var id = setInterval(frame, 10);
    function frame() {
        if (percent >= percentageOfGoal) {
            clearInterval(id);
        } else {
            percent++;
            elem.innerHTML = 'We have generated ' + percent * 1 + '% of our daily usage! <br>Total Generated: ' + todaysWatts + ' Watts<br>Daily Usage: ' + dailyUsage + ' Watts';
        }
    }
}

function removeActiveTab() {

    var x = document.getElementsByClassName("active");

    $(x).removeClass("active");

}

function getActiveTab(index) {
    var e = "";
    switch (index) {
        case 0:
            e = "#link0";
            break;
        case 1:
            e = "#link1";
            break;
        case 2:
            e = "#link2";
            break;
        case 3:
            e = "#link3";
            break;
        case 4:
            e = "#link4";
            break;
    }
    
   return e;
}
